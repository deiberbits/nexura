<div class="form-group">
    <label for="name">Nombre Completo <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre Completo" required
           data-parsley-trigger="change"
           data-parsley-pattern="/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/g"
           value="{{ $empleado->nombre ?? '' }}">
</div>
<div class="form-group">
    <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Correo Electrónico"
           required data-parsley-trigger="change" data-parsley-type="email"
           value="{{ $empleado->email ?? '' }}">
</div>
<div class="form-group">
    <label for="sexo">Sexo <span class="text-danger">*</span></label>
    @foreach($sexo as $id=>$s)
        <div class="form-check">
            <label class="form-check-label" for="sexo">
                <input class="form-check-input" type="radio" name="sexo" id="sexo" value="{{ $id }}"
                       @if( $empleado->sexo ?? '' == $id) checked @endif required>
                {{ $s }}
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="area">Área <span class="text-danger">*</span></label>
    <select class="form-control" id="area" name="area" required>
        <option value="">Seleccione un área</option>
        @foreach($areas as $area)
            <option value="{{ $area->id }}"
                    @if( $empleado->areas_id ?? '' == $area->id) selected @endif>{{ $area->nombre }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="description">Descripción <span class="text-danger">*</span></label>
    <textarea class="form-control" id="description" name="description" rows="3"
              required>{{ $empleado->descripcion ?? '' }}</textarea>
    <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox" value="1" id="boletin" name="boletin"
               @if( $empleado->boletin ?? '') checked @endif>
            Deseo recibir boletín informativo
        </label>
    </div>
</div>
<div class="form-group">
    <label for="roles">Roles <span class="text-danger">*</span></label>
    @foreach($roles as $rol)
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" value="{{ $rol->id }}" id="roles"
                       name="roles[]" required
                @if( $empleado??'' )
                    {{ $empleado->roles->contains($rol->id) ? 'checked' : '' }}
                    @endif
                >
                {{ $rol->nombre }}
            </label>
        </div>
    @endforeach
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>
