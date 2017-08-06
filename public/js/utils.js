/**
 * @description: Funciones de todo tipo para realizar
 * mas facilmente ciertas tareas
 * 
 */

const enfocar = function(id){
    // console.log('XD')
    var el = document.getElementById(id)
    if(el){
        el.focus()
    }else{
        console.warn('define un id con init_focus')
    }
}

const ver = function(){
    if(GLOBAL.console){
        for(i in arguments)
            console.log(arguments[i])
    }
}

const ezClon = function(obj){
    return JSON.parse(JSON.stringify(obj))
}