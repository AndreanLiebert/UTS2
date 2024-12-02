function changeCatalog(game_id){
    window.location.href = `index.php?page=catalog&c=${game_id}`;
}
function toTransaction(trid){
    if(trid==null)return;
    window.location.href = `transaction.php?trid=${trid}`;
}
function sayHello(){
    console.log("jello")
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