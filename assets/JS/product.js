let item = {name:"",id:null,price:null};
let payment = {name:"",id:null,fee:null};
let prevISpotlight=null,ISpotight=null;
let prevPSpotlight=null,PSpotight=null;
let allPayment = document.querySelectorAll(".payment-card");
let allItem = document.querySelectorAll(".item-card");
function changeItem(comp){
    ISpotight=comp;
    if(prevISpotlight!=null){prevISpotlight.classList.remove("item-choosen");}
    prevISpotlight=comp;
    ISpotight.classList.add("item-choosen");
    item.id = comp.querySelector("#item-id").value;
    item.name = comp.querySelector("#item-name").textContent;
    item.price = parseInt(comp.querySelector("#item-price").value);
    for(let i=0;i<allPayment.length;i++){
        allPayment[i].querySelector("#price").textContent = `Rp. ${formatNumber(item.price+parseInt(allPayment[i].querySelector("#payment-fee").value))}`;
    }
    if(PSpotight==null) changePayment(allPayment[0]);
    else changeBuy();
}
function changePayment(comp){
    PSpotight=comp;
    if(prevPSpotlight!=null){prevPSpotlight.classList.remove("payment-choosen");}
    prevPSpotlight=comp;
    PSpotight.classList.add("payment-choosen");
    payment.name = comp.querySelector("#payment-name").textContent;
    payment.id = comp.querySelector("#payment-id").value;
    payment.fee = parseInt(comp.querySelector("#payment-fee").value);
    if(item.id==null) changeItem(allItem[0]);
    changeBuy();
}
function changeBuy(){
    document.querySelector(".product-buy").style.display="block";
    document.querySelector("#detail-item").textContent = item.name;
    document.querySelector("#detail-payment").textContent = payment.name;
    document.querySelector("#detail-price").textContent = `Rp. ${formatNumber(item.price+payment.fee)}`;
}
function formatNumber(num){
    if(num.toString().length<4) return num;
    let dot = 1;
    let rtn ="";
    for(let i=num.toString().length-1;i>=0;i--){
        rtn = (dot>=3&&i!=0?`.${num.toString()[i]}`:num.toString()[i]) + rtn;
        dot = dot>=3?1:(dot+1);
    }
    return rtn;
}
for(let i=0;i<allItem.length;i++){
    allItem[i].querySelector(".item-bot").textContent = "Rp. "+formatNumber(allItem[i].querySelector(".item-bot").textContent);
}