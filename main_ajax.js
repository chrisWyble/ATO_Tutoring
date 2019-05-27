function chartLoad(){
    var selectedMajor = $('#majorsID').val();
    var selectedClass = $('#classesID').val();
    //alert("Selected major is " + selectedMajor);
    //alert("Selected class is " + selectedClass);
    if((selectedMajor !== null) && (selectedClass !== null)){
        
        $.post("PHP/chartLoad.php",
            {
              selectedMajor: selectedMajor,
              selectedClass: selectedClass
            },
            
            function(data,status){
                var JSONdata = JSON.parse(data);
                
                $('#majorChart').html('<tr><th>Name</th><th>Email</th></tr>')
                $('#classChart').html('<tr><th>Name</th><th>Email</th></tr>')
                
                for (i in JSONdata.majors) {
                    $('#majorChart').append('<tr><td>'+JSONdata.majors[i].name+'</td><td>'+JSONdata.majors[i].email+'</td><\tr>')
                    //alert("Majors info: \n Tutor name: " + JSONdata.majors[i].name + ", Tutor email: " + JSONdata.majors[i].email);
                }
                
                for (i in JSONdata.classes) {
                    $('#classChart').append('<tr><td>'+JSONdata.classes[i].name+'</td><td>'+JSONdata.classes[i].email+'</td><\tr>')
                    //alert("Classes info: \n Tutor name: " + JSONdata.classes[i].name + ", Tutor email: " + JSONdata.classes[i].email);
                }
                
                if(selectedMajor == 'Major Not Listed'){
                    alert("We are sorry no tutor shares your major");
                    
                }
                
                if(selectedClass == 'Class Not Listed'){
                    alert("We are sorry we don't have a tutor for this class");
                 } 
                
                //var tutorName = JSONdata.majors[0].name;
              //alert("Data: " + tutorName + "\nStatus: " + status);
            });
    }
}

