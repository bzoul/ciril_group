$( document ).ready(function() {
    index.init()
});
var index = {

    init:function () {
        $("#nextStep").click( function () {
            index.advanceStep();
        })
        $("#autoStep").click( function () {
            while ($('th').hasClass('fire')) {
                index.advanceStep();
            }
        })
    },
    
    //Avance la propagation du feu de t à t+1
    advanceStep:function () {
            $(".fire").each( function () {
                currentCase = parseInt($(this).attr("id"));
                idToFire = index.getIdToFire(currentCase);
                idToFire.forEach(function(id) {
                    getChanceToFire= $("#nextStep").attr("chance");
                    console.log(getChanceToFire)
                    random = Math.round(Math.random() * 100);
                    if (random <= getChanceToFire && $("#"+id).attr("class") == "green") {
                        $("#"+id).attr("class","fire");
                    }
                });
                $(this).attr("class","burned");
            });
    },

    //récupère l'Id des cases enflammables depuis la currentCase
    getIdToFire:function (currentCase) {
        let nbLine = $("tr").length;
        let nbCol =  $("th").length/ nbLine;
        var idToFire = []
        if ((currentCase - 1) > 0 && ((currentCase - 1) % nbCol) != 0) {
            idToFire.push(currentCase - 1);
        }
        if (((currentCase + 1) <= (nbLine*nbCol)) && ((currentCase + 1) % nbCol) != 1) {
            idToFire.push(currentCase + 1);
        }
        if ((currentCase + nbCol) <= (nbLine*nbCol)) {
            idToFire.push(currentCase + nbCol);
        }
        if ((currentCase - nbCol) > 0) {
            idToFire.push(currentCase - nbCol);
        }
        return(idToFire);
    },

}