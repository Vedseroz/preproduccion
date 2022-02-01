<style>

#loading{
	background-color: #ffffff;
	height: 400px;
	width: 100%;
	position: relative;
	z-index: 1;
	margin-top: 0px;
	top: 0px;
}
#loading-center{
	width: 100%;
	height: 100%;
	position: relative;
	}
#loading-center-absolute {
	position: absolute;
	left: 50%;
	top: 50%;
	height: 200px;
	width: 200px;
	margin-top: -100px;
	margin-left: -100px;
	-ms-transform: rotate(-135deg); 
   	-webkit-transform: rotate(-135deg); 
    transform: rotate(-135deg);

}
.object{

	-moz-border-radius: 50% 50% 50% 50%;
	-webkit-border-radius: 50% 50% 50% 50%;
	border-radius: 50% 50% 50% 50%;
	position: absolute;
	border-top: 5px solid #df1111;
	border-bottom: 5px solid transparent;
	border-left:  5px solid #e76c1d;
	border-right: 5px solid transparent;
	
	-webkit-animation: animate 2s infinite;
	animation: animate 2s infinite;	

	}


#object_one{
	left: 75px;
	top: 75px;
	width: 50px;
	height: 50px;
	}
							
#object_two{
	left: 65px;
	top: 65px;
	width: 70px;
	height: 70px;
	-webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
	}
		
#object_three{
	left: 55px;
	top: 55px;
	width: 90px;
	height: 90px;
	-webkit-animation-delay: 0.4s;
    animation-delay: 0.4s;
	}
#object_four{
	left: 45px;
	top: 45px;
	width: 110px;
	height: 110px;
	-webkit-animation-delay: 0.6s;
    animation-delay: 0.6s;
	
	}	

@-webkit-keyframes animate {
 

40% {

	-ms-transform: rotate(360deg) scale(0.8); 
   	-webkit-transform: rotate(360deg) scale(0.8); 
    transform: rotate(360deg) scale(0.8); 
  }
	  
  

}

@keyframes animate {
	
70% {

	-ms-transform: rotate(360deg) scale(0.8); 
   	-webkit-transform: rotate(360deg) scale(0.8); 
    transform: rotate(360deg) scale(0.8); 
  }	
	
	}




</style>

