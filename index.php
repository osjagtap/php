<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    
</head>
<body>
      <h1>My Restaurant</h1>
        <div id="main">
            
                <h2>Food Items</h2>
                
                    <select id="check">
                        
                    </select>
            
                <br>
                <div class="col-12 col-md-2" >
                    
                    <button type="submit" id="btn" class="btn btn-info">
                        Submit
                    </button>
                </div>
                
            
                </div>
      
        <br><br>
        </div>
    
       <div>
            <table id="tab">
                <tbody id="row">
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>           
                </tbody>
            </table>
        </div>
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
     

    
 
    let base_url = "https://inoperable-tooth.000webhostapp.com/restaurant.php";
        //base_url = "http://localhost/Reg/restaurant.php";

        $("document").ready(function(){
            getFoodList();
            getFoodById();
            $.get(base_url,function(data,success){
                console.log(data);
            });
        });

        function getFoodList() {
            let url = base_url + "?req=name_list";
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);


                 for (const item in data) {
                let itemName = data[item].name;
                let eachItem=document.createElement("option");
                eachItem.textContent=itemName;
                eachItem.value=item;
                document.querySelector('#check').appendChild(eachItem);
    
                }
            let btn = document.querySelector("#btn");
            btn.addEventListener('click',addItem);

            function addItem() {
        
        document.querySelector('#row').innerHTML="";
        let item=document.querySelector('#check').value;
        let list=data[item];

        for (i in list) {
            let tr=document.createElement("tr");
            let th=document.createElement("th");

            th.textContent=i;
            tr.appendChild(th);

            let td=document.createElement("td");
            td.textContent=list[i];
            
            tr.appendChild(td);
            document.querySelector('#row').appendChild(tr);
        }
    }


            });
        }
        
        function getFoodById() {
            let id = 877;
            let url = base_url + "?req=restaurant_data&id="+id;
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);

            });
        }
    </script>
    
    </body>
</html>