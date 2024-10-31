//Prevent right click
document.oncontextmenu = () =>{
    alert("🚫🚫 Don't allow !!🚫🚫")
    return false
}

//inspact off

document.onkeydown = e =>{
//PreventF12Key
if(e.key =="F12"){
    alert("🚫🚫 Don't allow !!🚫🚫")
    return false
}
//Prevent showing page sources by ctrl+U
if(e.ctrlKey && e.key == "u"){
alert("🚫🚫 Don't allow !!🚫🚫")
return false

}
//Prevent copying anythin frome the page
if(e.ctrlKey && e.key =="c") {
    alert("🚫🚫 Don't allow !!🚫🚫")
    return false
}
    //Prevent past anything to other sources
    if(e.ctrlKey && e.key == "v"){
        alert("🚫🚫 Don't allow !!🚫🚫")
        return false
    }

}