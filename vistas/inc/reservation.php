<script >
	/*--------- Buscar Paciente ---------*/
    function buscar_paciente(){
    	let input_paciente=document.querySelector('#input_paciente').value;

    	input_paciente=input_paciente.trim();

    	if (input_paciente!="") {
    		let data = new FormData();
    		data.append("buscar_paciente",input_paciente);

    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
    			method: 'POST',
    			body:data
    		})
			.then(respuesta => respuesta.text())
			.then(respuesta => {
				let tabla_paciente=document.querySelector('#tabla_pacientes');
				tabla_paciente.innerHTML=respuesta;
				
			});
    	}else{
    		Swal.fire({
				title: 'Ocurrio un error',
				text: 'Debes introcucir el DNI, Nombre, Apellido, Telefono',
				type: 'error',
				confirmButtonText: 'Aceptar'
			});

    	}
    }

    /*--------- Agregar Paciente ---------*/
    function agregar_paciente(id){
    	$('#ModalPaciente').modal('hide');

    	Swal.fire({
			title: '¿Quieres agregar este paciente?',
			text: 'Se va a agregar este paciente para realizar una cita',
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, agregar',
			cancelButtonText: 'No, cancelar'
		}).then((result) => {
			if(result.value){
				let data = new FormData();
	    		data.append("id_agregar_paciente",id);

	    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
	    			method: 'POST',
	    			body:data
	    		})
				.then(respuesta => respuesta.json())
				.then(respuesta => {
					return alertas_ajax(respuesta);
					
				});
			}else{
				$('#ModalPaciente').modal('show');
			}
		});
    }

    /*--------- buscar Tratamiento ---------*/
    function buscar_tratamiento(){
    	let input_tratamiento=document.querySelector('#input_tratamiento').value;

    	input_tratamiento=input_tratamiento.trim();

    	if (input_tratamiento!="") {
    		let data = new FormData();
    		data.append("buscar_tratamiento",input_tratamiento);

    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
    			method: 'POST',
    			body:data
    		})
			.then(respuesta => respuesta.text())
			.then(respuesta => {
				let tabla_tratamiento=document.querySelector('#tabla_tratamiento');
				tabla_tratamiento.innerHTML=respuesta;
				
			});
    	}else{
    		Swal.fire({
				title: 'Ocurrio un error',
				text: 'Debes introducir el codigo o nombre del tratamiento',
				type: 'error',
				confirmButtonText: 'Aceptar'
			});

    	}
    }

    
    /*--------- Agregar Tratamiento ---------*/
    function agregar_tratamiento(id){
    	$('#ModalTratamiento').modal('hide');

    	Swal.fire({
			title: '¿Quieres agregar este tratamiento?',
			text: 'Se va a agregar este tratamiento para agendar una cita',
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, agregar',
			cancelButtonText: 'No, cancelar'
		}).then((result) => {
			if(result.value){
				let data = new FormData();
	    		data.append("id_agregar_tratamiento",id);

	    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
	    			method: 'POST',
	    			body:data
	    		})
				.then(respuesta => respuesta.json())
				.then(respuesta => {
					return alertas_ajax(respuesta);
					
				});
			}else{
				$('#ModalTratamiento').modal('show');
			}
		});
    }

    /*--------- Buscar Odontologo ---------*/
    function buscar_odontologo(){
    	let input_odontologo=document.querySelector('#input_odontologo').value;
    	input_odontologo=input_odontologo.trim();

    	if (input_odontologo!="") {
    		let data = new FormData();
    		data.append("buscar_odontologo",input_odontologo);

    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
    			method: 'POST',
    			body:data
    		})
			.then(respuesta => respuesta.text())
			.then(respuesta => {
				let tabla_paciente=document.querySelector('#tabla_odontologo');
				tabla_paciente.innerHTML=respuesta;
				
			});
    	}else{
    		Swal.fire({
				title: 'Ocurrio un error',
				text: 'Debes introcucir el DNI, Nombre, Apellido, Telefono',
				type: 'error',
				confirmButtonText: 'Aceptar'
			});

    	}
    }

    /*--------- Agregar Odontologo ---------*/
    function agregar_odontologo(id){
    	$('#ModalOdontologo').modal('hide');

    	Swal.fire({
			title: '¿Quieres agregar este Odontologo?',
			text: 'Se va a agregar este Odontologo para realizar una cita',
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, agregar',
			cancelButtonText: 'No, cancelar'
		}).then((result) => {
			if(result.value){
				let data = new FormData();
	    		data.append("id_agregar_odontologo",id);

	    		fetch("<?php echo SERVERURL;?>ajax/citaAjax.php",{
	    			method: 'POST',
	    			body:data
	    		})
				.then(respuesta => respuesta.json())
				.then(respuesta => {
					return alertas_ajax(respuesta);
					
				});
			}else{
				$('#ModalOdontologo').modal('show');
			}
		});
    }
</script>