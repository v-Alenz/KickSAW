
function searchBarJS(){
    var input, progects, miss, count = 0;
    input = document.getElementById("searchBar");
    progects = document.getElementsByName("progects");
    miss  = document.getElementsByName("missProg");

    for(var i=0; i<progects.length; i++){
      if(!progects[i].textContent.toUpperCase().includes(input.value.toUpperCase())){
        progects[i].hidden = true;
        count++;
      }else{
        progects[i].hidden = false;
        count--;
      }
    }

    if(count == progects.length){
      miss[0].hidden = false;
    }else{
      miss[0].hidden = true;
    }
}
