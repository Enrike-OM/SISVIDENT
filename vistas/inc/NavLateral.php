<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="<?php echo SERVERURL; ?>vistas/assets/avatar/Avatar.png" class="img-fluid" alt="Avatar">
					<figcaption class="roboto-medium text-center">
						<?php echo $_SESSION['nombre_siscost']." ".$_SESSION['apellido_siscost']; ?> <br><small class="roboto-condensed-light">Odontologo</small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="<?php echo SERVERURL ?>home/"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Pacientes <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL ?>pacient-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar paciente</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>pacient-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de pacientes</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>pacient-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar paciente</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Tratamientos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL ?>tratamiento-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar tratamiento</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>tratamiento-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de tratamientos</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>tratamiento-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar tratamiento</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-file-invoice-dollar fa-fw"></i> &nbsp; Atención <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL ?>reservation-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nueva cita</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>reservation-reservation/"><i class="far fa-calendar-alt fa-fw"></i> &nbsp; Citas </a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>reservation-pending/"><i class="fas fa-hand-holding-usd fa-fw"></i> &nbsp; Pendientes</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>reservation-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Finalizados</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>reservation-search/"><i class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar por fecha</a>
								</li>
							</ul>
						</li>
						<?php if($_SESSION['privilegio_siscost']==1){?>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="<?php echo SERVERURL ?>user-new/"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo usuario</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>user-list/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
								</li>
								<li>
									<a href="<?php echo SERVERURL ?>user-search/"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar usuario</a>
								</li>
							</ul>
						</li>
						<?php }?>
					</ul>
				</nav>
			</div>
		</section>