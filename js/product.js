let item,payment;
let prevISpotlight=null,ISpotight=null;
let prevPSpotlight=null,PSpotight=null;
let allPayment = document.querySelectorAll(".payment-card");
function tes(){
    console.log("aod")
}
function changeItem(comp, price){
    ISpotight=comp;
    if(prevISpotlight!=null){prevISpotlight.classList.remove("item-choosen");}
    prevISpotlight=comp;
    ISpotight.classList.add("item-choosen");
    item = price;
    changePayment(allPayment[0]);
}
function changePayment(comp){
    PSpotight=comp;
    if(prevPSpotlight!=null){prevPSpotlight.classList.remove("payment-choosen");}
    prevPSpotlight=comp;
    PSpotight.classList.add("payment-choosen");
    for(let i=0;i<allPayment.length;i++){
        allPayment[i].querySelector("#price").textContent = `Rp. ${item+(item*allPayment[i].querySelector("#tax").value)}`;
    }
}