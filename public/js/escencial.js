/**
 * @description: Funciones de todo tipo para realizar
 * mas facilmente ciertas tareas
 * 
 */

const enfocar = function(id){
    var el = document.getElementById(id)
    if(el){
        el.focus()
    }else{
        console.warn('define un id con init_focus')
    }
}