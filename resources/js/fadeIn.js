var perfil = document.getElementById('');
addEventListener('click',function(){ editarCita(this.getAttribute('id')) });



var fadeEffect=function(){
	return{
		init:function(id, flag, target){
			this.elem = document.getElementById(id);
			clearInterval(this.elem.si);
			this.target = target ? target : flag ? 100 : 0;
			this.flag = flag || -1;
			this.alpha = this.elem.style.opacity ? parseFloat(this.elem.style.opacity) * 100 : 0;
			this.elem.si = setInterval(function(){fadeEffect.tween()}, 20);
		},
		tween:function(){
			if(this.alpha == this.target){
				clearInterval(this.elem.si);
			}else{
				var value = Math.round(this.alpha + ((this.target - this.alpha) * .05)) + (1 * this.flag);
				this.elem.style.opacity = value / 100;
				this.elem.style.filter = 'alpha(opacity=' + value + ')';
				this.alpha = value
			}
		}
	}
}();