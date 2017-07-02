<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <legend>{{type}} </legend>
            
            <!--form-->
            <div>
                <div class="form-group">
                    <label for="">Detalle</label>
                    <input class="form-control"
                        type="text"
                        placeholder="Detalle"
                        maxlength="255"
                        required
                        ng-model="form.detail">
                </div>


                <button ng-click="registrar()" type="submit" class="btn btn-primary">Guardar</button>
                <button ng-click="cancelar()" type="button" class="btn btn-danger">Cancelar</button>
                
            </div>
            <!--end-form-->
        </div>
    </div>
</div>