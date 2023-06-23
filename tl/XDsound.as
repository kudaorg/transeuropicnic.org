
// SOUNDS

// createSoundObject(sndToAttach) - creates and returns a reference to an mc (sound object)
//                                - usage: _global.snd_marching = _root.createSoundObject("marching");  **where "marching" is the identifier for the sound in the library (doesn't have to be _global, of course)
// mc.playSound(pan,vol,loops) - plays thisSound at 100 or thisVol
// mc.volumeTo(volumeTarget, speed, stopSound) - fades the sound referred to by mc to the volumeTarget, at the rate of speed or default(10), and stops the sound if stopSound == true
// soundOff(now) - fades the global sound to 0 gradually or sets it to 0 immediately is now == true
// ambienceOFF() - fades out the ambiennt sound -- NEEDS A "ambientSound" declared
// ambienceON() - fades up the ambiennt sound -- NEEDS A "ambientSound" declared and an "ambientSoundVol"
// localSoundON() - fades the local(i.e., attached to sfxHolder) sound to 100 **DOESN'T AFFECT TRAILER SOUND, ETC.--USE soundON()/soundOFF()/globalVolumeTo
// localSoundOFF() - fades the local(i.e., attached to sfxHolder) sound to 0 **DOESN'T AFFECT TRAILER SOUND, ETC.--USE soundON()/soundOFF()/globalVolumeTo
// localVolumeTo(volumeTarget, speed) - fades the local (sfx) sound to the volumeTarget, at the rate of speed or default(10) **DOESN'T AFFECT TRAILER SOUND, ETC.--USE soundON()/soundOFF()/globalVolumeTo
// soundON() - fades the global sound to 100
// soundOFF() - fades the global sound to 0
// globalVolumeTo(volumeTarget, speed) - fades the global sound to the volumeTarget, at the rate of speed or default(10)



// SOUND FUNCTIONS

_global.globalSound = new Sound();

sndObjectCount = 0;
_root.createEmptyMovieClip("sfxHolder",0);

_global.localSound = new Sound("sfxHolder");
localSound.setVolume(100); 

// CREATES A NEW SOUND OBJ

_global.createSoundObject = function (sndToAttach){
	sfxHolder.createEmptyMovieClip("snd" + sndObjectCount,sndObjectCount);
	thisSndObject = eval("sfxHolder.snd" + sndObjectCount);
	
	thisSndObject.snd = new Sound(thisSndObject);
	thisSndObject.snd.attachSound(sndToAttach);

	thisSndObject.snd.setVolume(0);
	thisSndObject.snd.stop();

	sndObjectCount += 1;
	return(thisSndObject);
}

// PLAYS A SOUND OBJ (AT A CERTAIN VOLUME)

MovieClip.prototype.playSound = function (pan,vol,loops){
	//trace(thisSound);
	vol ? this.snd.setVolume(vol) : this.snd.setVolume(100);
	pan ? this.snd.setPan(pan) : this.snd.setPan(0);
	this.snd.start(0,loops);
}

// VOLUME TO
MovieClip.prototype.volumeTo = function(targetTo, speed, stopSound) {

	trace("###########this.snd:" + this.snd);

	this.volumeToMC = this.initMCfunctions("volumeTo");

	if(targetTo > 100){
		targetTo = 100;
	}
	
	if(targetTo == 0) {
		this.snd.looping = false;
	} else {
		this.snd.looping = true;
	}

	if(this.snd.position == 0){
		this.snd.start(0,999);
	}

	this.volumeToMC.targetTo = targetTo;
	this.volumeToMC.speed = speed;

	this.volumeToMC.snd = this.snd;

	this.volumeToMC.onEnterFrame = function(){
		if (!this.speed) {
			this.speed = _root.defaultSoundSpeed;
		}
		if (Math.round(this.snd.getVolume()) != Math.round(this.targetTo)) {
	
			if(this.snd.getVolume() > this.targetTo){
				this.changeToThis = this.snd.getVolume() - this.speed;
		
				if (Math.round(this.changeToThis) <= Math.round(this.targetTo)) {
					this.snd.setVolume(this.targetTo);
					if (this.targetTo == 0) this.snd.stop();
					this.removeMovieClip();
				} else {
					this.snd.setVolume(this.changeToThis);
				}
			} else if(this.snd.getVolume() < this.targetTo){
				this.changeToThis = this.snd.getVolume() + this.speed;
		
				if (Math.round(this.changeToThis) >= Math.round(this.targetTo)) {
					this.snd.setVolume(this.targetTo);
					if (this.targetTo == 0) this.snd.stop();
					this.removeMovieClip();
				} else {
					this.snd.setVolume(this.changeToThis);
				}
			}
		} else {
			this.snd.setVolume(targetTo);
			if (this.targetTo == 0) this.snd.stop();
			this.removeMovieClip();
		}
	}
}

// PAN TO
MovieClip.prototype.panTo = function(targetTo, speed, stopSound) {
 	
	if (this.snd.looping == true) {
	
		this.createEmptyMovieClip("panToMC",100001);

		if(targetTo > 100) targetTo = 100;
		if(targetTo < -100) targetTo = -100;

		this.panToMC.targetTo = targetTo;
		this.panToMC.speed = speed;
		this.panToMC.snd = this.snd;

		this.panToMC.onEnterFrame = function(){
			if (!this.speed) this.speed = 25;
			if (Math.round(this.snd.getPan()) != Math.round(this.targetTo)) {
	
				if(this.snd.getPan() > this.targetTo){
					this.changeToThis = this.snd.getPan() - this.speed;
		
					if (Math.round(this.changeToThis) <= Math.round(this.targetTo)) {
						this.snd.setPan(this.targetTo);
						this.removeMovieClip();
					} else {
						this.snd.setPan(this.changeToThis);
					}
				} else if(this.snd.getPan() < this.targetTo){
					this.changeToThis = this.snd.getPan() + this.speed;
		
					if (Math.round(this.changeToThis) >= Math.round(this.targetTo)) {
						this.snd.setPan(this.targetTo);
						this.removeMovieClip();
					} else {
						this.snd.setPan(this.changeToThis);
					}
				}
			} else {
				this.snd.setPan(targetTo);
				this.removeMovieClip();
			}
		}
	}
}

// AMBIENCE

_global.ambienceOFF = function(){
	ambientSound.volumeTo(0);
}

_global.ambienceON = function(){
	ambientSound.volumeTo(ambientSoundVol);
}

// CALLS TO FADE OR IMMEDIATELY MUTES LOCAL SOUND

_global.localSoundOFF = function (now){
	if(now){
		localSound.setVolume(0);
		localSound.stop();
	} else {
		localVolumeTo(0);
	}
}

// CALLS TO FADE UP LOCAL SOUND

_global.localSoundON = function (){
	localVolumeTo(100);
}

// LOCAL VOLUME TO

_global.localVolumeTo = function(targetTo, speed) {

	localVolumeToMC = initMCfunctions("localVolumeTo");

	if(targetTo > 100){
		targetTo = 100;
	}

	if(localSound.position == 0){
		localSound.start(0,999);
	}

	localVolumeToMC.targetTo = targetTo;
	localVolumeToMC.speed = speed;

	localVolumeToMC.onEnterFrame = function(){

	//trace(localSound.getVolume());
		if (!this.speed) {
			this.speed = _root.defaultSoundSpeed;
		}
		if (Math.round(localSound.getVolume()) != Math.round(this.targetTo)) {
	
			if(localSound.getVolume() > this.targetTo){
				this.changeToThis = localSound.getVolume() - this.speed;
		
				if (Math.round(this.changeToThis) <= Math.round(this.targetTo)) {
					localSound.setVolume(this.targetTo);
					if (this.targetTo == 0) localSound.stop();
					this.removeMovieClip();
				} else {
					localSound.setVolume(this.changeToThis);
				}
			} else if(localSound.getVolume() < this.targetTo){
				this.changeToThis = localSound.getVolume() + this.speed;
		
				if (Math.round(this.changeToThis) >= Math.round(this.targetTo)) {
					localSound.setVolume(this.targetTo);
					if (this.targetTo == 0) localSound.stop();
					this.removeMovieClip();
				} else {
					localSound.setVolume(this.changeToThis);
				}
			}
		} else {
			localSound.setVolume(this.targetTo);
			if (this.targetTo == 0) localSound.stop();
			this.removeMovieClip();
		}
	}
}

// CALLS TO FADE OR IMMEDIATELY MUTES GLOBAL SOUND

_global.soundOFF = function (now){
	if(now){
		globalSound.setVolume(0);
		globalSound.stop();
	} else {
		globalVolumeTo(0);
	}
}

// CALLS TO FADE UP GLOBAL SOUND

_global.soundON = function (){
	globalVolumeTo(100);
}

// GLOBAL VOLUME TO

globalVolumeTo = function(targetTo, speed) {

	globalVolumeToMC = initMCfunctions("globalVolumeTo");

	if(targetTo > 100){
		targetTo = 100;
	}

	if(globalSound.position == 0){
		globalSound.start(0,999);
	}

	globalVolumeToMC.targetTo = targetTo;
	globalVolumeToMC.speed = speed;

	globalVolumeToMC.onEnterFrame = function(){

	//trace(globalSound.getVolume());
		if (!this.speed) {
			this.speed = _root.defaultSoundSpeed;
		}
		if (Math.round(globalSound.getVolume()) != Math.round(this.targetTo)) {
	
			if(globalSound.getVolume() > this.targetTo){
				this.changeToThis = globalSound.getVolume() - this.speed;
		
				if (Math.round(this.changeToThis) <= Math.round(this.targetTo)) {
					globalSound.setVolume(this.targetTo);
					if (this.targetTo == 0) globalSound.stop();
					this.removeMovieClip();
				} else {
					globalSound.setVolume(this.changeToThis);
				}
			} else if(globalSound.getVolume() < this.targetTo){
				this.changeToThis = globalSound.getVolume() + this.speed;
		
				if (Math.round(this.changeToThis) >= Math.round(this.targetTo)) {
					globalSound.setVolume(this.targetTo);
					if (this.targetTo == 0) globalSound.stop();
					this.removeMovieClip();
				} else {
					globalSound.setVolume(this.changeToThis);
				}
			}
		} else {
			globalSound.setVolume(this.targetTo);
			if (this.targetTo == 0) globalSound.stop();
			this.removeMovieClip();
		}
	}
}

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

volumeTo_depth = 7;
defaultSoundSpeed = 2;

// CREATED FUNCTION HOLDER MCs
MovieClip.prototype.initMCfunctions = function(func){
	if(!this.funcHolderMC){
		this.createEmptyMovieClip("funcHolderMC",1048575); // the holder to which all the onEnterFrame mcs are attached
	}													   // attached at a depth that won't interfere with anything else
														   // (i.e., the topmost depth available) [ attaching it to -16384
														   // caused problems if the mc returned to frame 1--no idea why]

	depth = _root[func + "_depth"];
	this.funcHolderMC.createEmptyMovieClip(func + "MC",depth);

	thisMC = this.funcHolderMC[func + "MC"];
	return thisMC;
}