/*<![CDATA[*/

function Slide(o){
 var obj=document.getElementById(o.ID);
 this.pobj=obj.parentNode
 this.fromto=[o.From,o.To];
 this.ud=true;
 this.slide=new zxcAnimate('left',obj,o.From);
 this.ms=o.Duration||1000;
 this.ReSize();
}

Slide.prototype.Slide=function(){
 this.ud=!this.ud;
 clearTimeout(this.to);
 this.slide.animate(this.slide.obj.offsetLeft,this.pobj.offsetWidth+this.fromto[this.ud?0:1],this.ms,this.fromto);
}

Slide.prototype.ReSize=function(){
 this.ud=true;
 this.slide.obj.style.left=this.pobj.offsetWidth+this.fromto[0]+'px';
}

var S=new Slide({
  ID:'tst',
  From:0,
  To:-300,
  Duration:500
});

S.to=setTimeout(function(){ S.Slide(); },2000);

/*]]>*/