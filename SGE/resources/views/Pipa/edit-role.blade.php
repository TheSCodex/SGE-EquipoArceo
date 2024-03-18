@extends('templates/authTemplate')
@section('contenido')
<div class="w-full h-screen flex justify-center items-center bg-white">
    <div class="overflow-y-auto max-h-screen"> <!-- Agregado -->
    <form action="{{ route('panel-roles.update', $role->id) }}" method="POST" class="flex flex-col font-montserrat space-y-5 w-full md:w-[40rem]">
        @csrf
        @method('PUT')
        <div class="w-full h-fit flex justify-start">
            <h1 class="text-3xl font-bold">Editar rol</h1>
        </div>
        <div class="w-full h-fit flex flex-col space-y-2">
            <div class="w-full space-y-2">
                <p class="text-sm">Nombre del rol</p>
                <input type="text" name="rol_name" value="{{ $role->title }}" class="text-sm w-full rounded-md border-lightGray border-2 px-4 py-3" placeholder="Nombre del rol">
                @error('rol_name')
                    <p class="text-[#ff0000] text-sm">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="w-full space-y-2">
                <p class="text-sm">Permisos</p>
                <div class="grid grid-cols-2 gap-4 overflow-y-scroll h-[250px]">
                    <div class="flex flex-col space-y-2"> <!-- Primera columna -->
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crear-anteproyecto]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crear-anteproyecto']) && $role->permissions['crear-anteproyecto'] ? 'checked' : '' }}>
                                <label for="crear-anteproyecto" class="text-sm">Crear anteproyecto</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[editar-anteproyecto]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['editar-anteproyecto']) && $role->permissions['editar-anteproyecto'] ? 'checked' : '' }}>
                                <label for="editar-anteproyecto" class="text-sm">Editar anteproyecto</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-observaciones]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-observaciones']) && $role->permissions['leer-observaciones'] ? 'checked' : '' }}>
                                <label for="leer-observaciones" class="text-sm">Leer observaciones (de su anteproyecto)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[comentar-observaciones]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['comentar-observaciones']) && $role->permissions['comentar-observaciones'] ? 'checked' : '' }}>
                                <label for="comentar-observaciones" class="text-sm">Comentar observaciones</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-calendario]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-calendario']) && $role->permissions['leer-calendario'] ? 'checked' : '' }}>
                                <label for="leer-calendario" class="text-sm">Leer calendario</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-estudiantes-asignados]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-estudiantes-asignados']) && $role->permissions['leer-estudiantes-asignados'] ? 'checked' : '' }}>
                                <label for="leer-estudiantes-asignados" class="text-sm">Leer Estudiantes asignados/asesorados (Información de cada uno)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-anteproyectos-asignados]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-anteproyectos-asignados']) && $role->permissions['leer-anteproyectos-asignados'] ? 'checked' : '' }}>
                                <label for="leer-anteproyectos-asignados" class="text-sm">Leer anteproyectos (asignados)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-anteproyecto-detalles]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-anteproyecto-detalles']) && $role->permissions['leer-anteproyecto-detalles'] ? 'checked' : '' }}>
                                <label for="leer-anteproyecto-detalles" class="text-sm">Leer anteproyecto especifico (Ver detalles de uno)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-anteproyectos-publicados]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-anteproyectos-publicados']) && $role->permissions['leer-anteproyectos-publicados'] ? 'checked' : '' }}>
                                <label for="leer-anteproyectos-publicados" class="text-sm">Leer anteproyectos publicados (Solo de su división)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crear-observacion]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crear-observacion']) && $role->permissions['crear-observacion'] ? 'checked' : '' }}>
                                <label for="crear-observacion" class="text-sm">Crear observación</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[resolver-eliminar-observacion]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['resolver-eliminar-observacion']) && $role->permissions['resolver-eliminar-observacion'] ? 'checked' : '' }}>
                                <label for="resolver-eliminar-observacion" class="text-sm">Resolver/Eliminar observación (Solo si es suya)</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[votar-anteproyecto]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['votar-anteproyecto']) && $role->permissions['votar-anteproyecto'] ? 'checked' : '' }}>
                                <label for="votar-anteproyecto" class="text-sm">Votar anteproyecto</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crear-actividad-calendario]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crear-actividad-calendario']) && $role->permissions['crear-actividad-calendario'] ? 'checked' : '' }}>
                                <label for="crear-actividad-calendario" class="text-sm">Crear actividad en el calendario</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[gestionar-bajas]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['gestionar-bajas']) && $role->permissions['gestionar-bajas'] ? 'checked' : '' }}>
                                <label for="gestionar-bajas" class="text-sm">Gestionar Bajas</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-anteproyectos-division]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-anteproyectos-division']) && $role->permissions['leer-anteproyectos-division'] ? 'checked' : '' }}>
                                <label for="leer-anteproyectos-division" class="text-sm">Leer anteproyectos de la división</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-anteproyecto-especifico]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-anteproyecto-especifico']) && $role->permissions['leer-anteproyecto-especifico'] ? 'checked' : '' }}>
                                <label for="leer-anteproyecto-especifico" class="text-sm">Leer anteproyecto en especifico</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-asesores-academicos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-asesores-academicos']) && $role->permissions['leer-asesores-academicos'] ? 'checked' : '' }}>
                                <label for="leer-asesores-academicos" class="text-sm">Leer asesores académicos</label>
                            </div>
        
                        </div>
                    <div class="flex flex-col space-y-2"> <!-- Segunda columna -->
                               
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crear-asesores-academicos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crear-asesores-academicos']) && $role->permissions['crear-asesores-academicos'] ? 'checked' : '' }}>
                                <label for="crear-asesores-academicos" class="text-sm">Crear asesores académicos</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[editar-asesores-academicos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['editar-asesores-academicos']) && $role->permissions['editar-asesores-academicos'] ? 'checked' : '' }}>
                                <label for="editar-asesores-academicos" class="text-sm">Editar asesores académicos</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[eliminar-asesores-academicos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['eliminar-asesores-academicos']) && $role->permissions['eliminar-asesores-academicos'] ? 'checked' : '' }}>
                                <label for="eliminar-asesores-academicos" class="text-sm">Eliminar asesores académicos</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-estudiantes]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-estudiantes']) && $role->permissions['leer-estudiantes'] ? 'checked' : '' }}>
                                <label for="leer-estudiantes" class="text-sm">Leer estudiantes</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[asignar-asesor-estudiante]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['asignar-asesor-estudiante']) && $role->permissions['asignar-asesor-estudiante'] ? 'checked' : '' }}>
                                <label for="asignar-asesor-estudiante" class="text-sm">Asignar asesor a estudiante</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-bajas]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-bajas']) && $role->permissions['leer-bajas'] ? 'checked' : '' }}>
                                <label for="leer-bajas" class="text-sm">Leer bajas</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-reportes]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-reportes']) && $role->permissions['leer-reportes'] ? 'checked' : '' }}>
                                <label for="leer-reportes" class="text-sm">Leer reportes</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[generar-reportes-documentos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['generar-reportes-documentos']) && $role->permissions['generar-reportes-documentos'] ? 'checked' : '' }}>
                                <label for="generar-reportes-documentos" class="text-sm">Generar reportes de documentos</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[gestionar-documentos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['gestionar-documentos']) && $role->permissions['gestionar-documentos'] ? 'checked' : '' }}>
                                <label for="gestionar-documentos" class="text-sm">Gestionar documentos</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[leer-lista-libros]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['leer-lista-libros']) && $role->permissions['leer-lista-libros'] ? 'checked' : '' }}>
                                <label for="leer-lista-libros" class="text-sm">Leer lista de libros</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crear-libro]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crear-libro']) && $role->permissions['crear-libro'] ? 'checked' : '' }}>
                                <label for="crear-libro" class="text-sm">Crear libro</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[editar-libro]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['editar-libro']) && $role->permissions['editar-libro'] ? 'checked' : '' }}>
                                <label for="editar-libro" class="text-sm">Editar libro</label>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[eliminar-libro]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['eliminar-libro']) && $role->permissions['eliminar-libro'] ? 'checked' : '' }}>
                                <label for="eliminar-libro" class="text-sm">Eliminar libro</label>
                            </div>

                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crud-usuarios]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crud-usuarios']) && $role->permissions['crud-usuarios'] ? 'checked' : '' }}>
                                <label for="crud-usuarios" class="text-sm">CRUD usuarios</label>
                            </div>
        
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crud-empresas]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crud-empresas']) && $role->permissions['crud-empresas'] ? 'checked' : '' }}>
                                <label for="crud-empresas" class="text-sm">CRUD empresas</label>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crud-roles-permisos]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crud-roles-permisos']) && $role->permissions['crud-roles-permisos'] ? 'checked' : '' }}>
                                <label for="crud-roles-permisos" class="text-sm">CRUD roles y permisos</label>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crud-asesores]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crud-asesores']) && $role->permissions['crud-asesores'] ? 'checked' : '' }}>
                                <label for="crud-asesores" class="text-sm">CRUD asesores</label>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="permissions[crud-carreras-divisiones]" value="true" class="text-sm rounded border-lightGray border-2 px-4 py-3" {{ isset($role->permissions['crud-carreras-divisiones']) && $role->permissions['crud-carreras-divisiones'] ? 'checked' : '' }}>
                                <label for="crud-carreras-divisiones" class="text-sm">CRUD carreras y divisiones</label>
                            </div>
                        </div>
                </div>
                @error('permissions')
                    <p class="text-[#ff0000] text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="p-2 bg-primaryColor sm:w-[20rem] md:w-[30rem] rounded-md text-white">Actualizar rol</button>
    </form>
    </div>
</div>
@endsection
