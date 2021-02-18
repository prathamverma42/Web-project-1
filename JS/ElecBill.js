function doac() {
    /*if(document.getElementById("chkac").checked)*/
    /*Not need to check the checkbox bcz this function is only called when the checkbox is clicked*/
    document.getElementById("acbtn").disabled = false;
     document.getElementById("acbtn").focus();
}

function docooler() {
    /*if(document.getElementById("chkcooler").checked)*/
    document.getElementById("coolerbtn").disabled = false;
     document.getElementById("coolerbtn").focus();
}

function dofan() {
    /*if(document.getElementById("chkfan").checked)*/
    document.getElementById("fanbtn").disabled = false;
     document.getElementById("fanbtn").focus();
   
}
function dobill(){
    var a=document.getElementById("acbtn").value;
    var b=document.getElementById("coolerbtn").value;
    var c=document.getElementById("fanbtn").value;
    var unit=document.getElementById("units").value;
    
    document.getElementById("acbilllabel").disabled=false;
    document.getElementById("acbilllabel").value=parseFloat(a*100);
    
    document.getElementById("coolerbilllabel").disabled=false;
    document.getElementById("coolerbilllabel").value=parseFloat(b*50);
    
    document.getElementById("fanbilllabel").disabled=false;
    document.getElementById("fanbilllabel").value=parseFloat(c*20);
    
    document.getElementById("unitsbilllabel").disabled=false;
    document.getElementById("unitsbilllabel").value=parseFloat(unit*10);
    
    document.getElementById("totalbilllabel").disabled=false;
    totalbill=parseFloat(a*100)+parseFloat(b*50)+parseFloat(c*20)+parseFloat(unit*10)
    document.getElementById("totalbilllabel").value=totalbill; 
}
function dodiscount(){
    discount=0;
    var a=document.getElementById("combtn");
    var b=document.getElementById("resbtn");
    if(a.checked==true)
    {
                discount=parseFloat(0.1*totalbill);

    }
     if(b.checked==true)
        {
            discount=parseFloat(0.2*totalbill);

        }
    
    document.getElementById("discountlabel").disabled=false;
    document.getElementById("discountlabel").value=discount;
}
function donet(){
    document.getElementById("totalbilldiscountlabel").disabled=false;
    document.getElementById("totalbilldiscountlabel").value=parseFloat(totalbill)-parseFloat(discount);
}
