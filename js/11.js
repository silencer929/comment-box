$(document).ready(()=>{
	class rectangle{
	constructor(){
		this.border_radius=0;
		this.background=null;
		this.background=null;
	}
draw(){
	var frame=`<div class="frame" style="border-radius:${this.border_radius};" >
			<img src="#" class="image">
		</div>`;
		$(".pic-holder").html(frame);
	}

}
class circle{
	constructor(){
		this.border_radius="30px";
		this.border=null;
		this.image=null;
		this.background="#fff"
	}
draw(){
	var frame=`<div class="frame" style="border-radius:${this.border_radius};background-color:${this.background};" >
			<img src="#" class="image">
		</div>`;
		$(".pic-holder").html(frame)
}
}
class decorator{
	constructor(shape){
	}
	draw(){
		var frame=`<div class="frame" style="border-radius:${this.shape.border_radius}; border:${this.shape.border};" >
			<img src="${this.shape.image}" class="image">
		</div>`
		$(".pic-holder").html(frame)
	}
}
class image extends decorator {
	constructor(shape){
		super(shape);
		this.shape=shape;
		this.shape.image="img/cap.jpg";
		this.draw()
	}

	}
	class border extends decorator{
		constructor(shape){
			super(shape);
			console.log(shape)
			this.shape=shape;
			this.shape.border="2px solid black";
			this.draw();
		}
	}


function getProfile(profile,line=false,topping=false){
	var obj;
	if(profile=="circle"){
			obj= new circle();
			obj.draw()
	}
	if(profile=="rectangle"){
		obj= new rectangle();
		obj.draw();
	}
	if(obj){
		if(line=="border"){
		 obj=new border(obj);
	}
		if(topping=="image"){
			obj=new image(obj);
		}
	

	}
}

$(".btn").on("click",()=>{
	getProfile("circle","border","image");
})

})


















