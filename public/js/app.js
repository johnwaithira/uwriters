
        var open = 0;
        document.querySelector(".nav-hum").addEventListener("click", function(){
            
            if(open == 1){
                document.querySelector(".nav-link").style.top = -1000 + "px";
                open =0;
                
            }
            else{
                document.querySelector(".nav-link").style.top = 100 + "px";
                open = 1;
            }
            console.log(open);
        });


        var side = 0;
        document.querySelector("#checkMeLabel").addEventListener("click", function(){
            
            if(side == 1){
                document.querySelector(".navs").style.display = "none";   
                side =0;
                
            }
            else{
                document.querySelector(".navs").style.display = "block";
                side = 1;
            }
        });


        function thumbnail(up_image, show_div)
        {
            const image = document.getElementById(up_image);
            image.addEventListener("change", function(){
                const reader = new FileReader();
                reader.addEventListener("load", ()=>{
                    const uploadedimg = reader.result;
                    const showuploaded = document.getElementById(show_div);
                    showuploaded.style.background = `url(${uploadedimg})`;
                    showuploaded.style.backgroundSize = "cover";
                });
                reader.readAsDataURL(this.files[0]);
            });
        }

        
          
            
        function auto($data){
            for(let i = 0; i<$data.length; i++){
                $("#" + $data[i]).on('input', function(){
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight)+ 'px';
                });
            }
        }

        var blue = "#007bff",
            indigo= "#6610f2",
            purple= "#6f42c1",
            pink= "#e83e8c",
            red = "#dc3545",
            orange= "#fd7e14",
            yellow= "#ffc107",
            green= "#28a745",
            teal= "#20c997",
            cyan= "#17a2b8",
            white= "#fff",
            gray= "#6c757d",
            gray_dark= "#343a40",
            primary= "#007bff",
            secondary= "#6c757d",
            success= "#28a745",
            info= "#17a2b8",
            warning= "#ffc107",
            danger= "#dc3545",
            light = "#f8f9fa",
            dark ="#343a40";

        function toast(text, timeout, color)
        {
            var msg = `
		<div style="background:${color}; max-width:300px;" class="text-center b-r-10 zoom">
			<div class="p-10-30 ">
				<div>
					<p class="f-w-900" style="color: #f8f8f8!important;">${text}</p>
				</div>
			</div>	
		</div>
			
		`
            var toastbox = document.getElementById("toast")
            toastbox.innerHTML = msg
            setTimeout(()=>{
                toastbox.innerHTML = ""
            }, timeout)
        }

        function validate()
        {
            var inputs = $("#form .input");
            var check = true
            for(var i = 0; i< inputs.length; i++)
            {
                if(inputs[i].value.length == 0)
                {
                    $("#"+ inputs[i].getAttribute("id")).css({
                        'border' : '1px solid #fb2b2b'
                    })
                    check = false
                }else
                {
                    $("#"+ inputs[i].getAttribute("id")).css({
                        'border' : '1px solid #1c1c2467'
                    })
                }
            }
            return check;
        }
