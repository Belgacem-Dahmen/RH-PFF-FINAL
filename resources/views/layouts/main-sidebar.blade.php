<!-- main-sidebar -->
		<div class="app-sidebar__overlay  " data-toggle="sidebar" ></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/newlogo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/newlogo.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/newlogo.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/newlogo.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::user()->email}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="side-item side-item-category">Espace gestion des demandes</li>
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/' . $page='dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">Espace principal  </span></span></a>
					</li>
					@can ('Attestations')
					<li class="side-item side-item-category">Attestations </li>
					

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">Attestations</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							@can ('ETAT DES DEMANDES PAPIERS ADMINISTRATIF')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-morris') }}">ETAT DES DEMANDES PAPIERS ADMINISTRATIF</a></li><br>
                            @endcan
							@can ('Attestations de travail')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-morris') }}">Attestations de travail</a></li><br>
							@endcan
							@can ('Attestations de salaire annuel brut')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">Attestations de salaire annuel brut</a></li><br>
							@endcan
							@can ('Attestions de non bénéfice de prêt')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Attestions de non bénéfice de prêt </a></li><br>
							@endcan
							@can ('Titre de congé payé')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Titre de congé payé </a></li><br>
							@endcan
							@can ('Certificat de retenue d`impôt sur le revenu')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Certificat de retenue d`impôt sur le revenu </a></li><br>
							@endcan
							@can ('ARCHIVES DEMANDES PAPIERS ADMINISTRATIF')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">ARCHIVES DEMANDES PAPIERS ADMINISTRATIF </a></li>
							@endcan
						</ul>
					</li> 
					@endcan
					<!-- offleaves -->
					@can ('Congés et Autorisations')
					<li class="side-item side-item-category">Congés et Autorisations </li>
					
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/><path d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg><span class="side-menu__label">Congés et Autorisations</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							@can ('Etat des Demandes Congés')
							<li><a class="slide-item" href="{{ url('/' . $page='conges') }}">Etat des Demandes Congés   </a></li><br>
							@endcan
							@can ('Les congés payés')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-morris') }}">Les congés payés</a></li><br>
							@endcan
							@can ('Les congés sans solde')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">Les congés sans solde</a></li><br>
							@endcan
							@can ('Les autorisations de sortie')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Les autorisations de sortie</a></li><br>
							@endcan
							@can ('Formulaire de retard')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">Formulaire de retard</a></li> <br>
							@endcan
							@can ('ARCHIVES DES DEMANDES')
							<li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">ARCHIVES DES DEMANDES  </a></li>
							@endcan
						</ul>
						@endcan
					</li>
					
					<!-- end-offleaves -->
					@can ('Reporting')
					<li class="side-item side-item-category">Reporting</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label">Reporting</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							@can ('Reporting congés')
							<li><a class="slide-item" href="{{ url('/' . $page='cards') }}">Reporting congés</a></li>
							@endcan
							@can ('Reporting Demandes Attestations')
							<li><a class="slide-item" href="{{ url('/' . $page='darggablecards') }}">Reporting Demandes Attestations </a></li>
							@endcan
							@can ('Reporting employés')
							<li><a class="slide-item" href="{{ url('/' . $page='darggablecards') }}">Reporting employés</a></li>
							@endcan
						</ul>
						@endcan	
					</li>
					

						@can ('Les Utilisateurs')			
					<li class="side-item side-item-category">Les Utilisateurs</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">Roles et permission</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							
							@can ('Liste des Utilisateurs')
							<li><a class="slide-item" href="{{ url('/' . $page='users') }}">Liste des Utilisateurs</a></li>
							@endcan
							@can ('Roles Des Utilisateurs')
							<li><a class="slide-item" href="{{ url('/' . $page='roles') }}">Roles Des Utilisateurs  </a></li>
							@endcan
						
						</ul>
						@endcan	
					</li>
					
					@can ('les paramètres de gestion')
					<li class="side-item side-item-category">les paramètres de gestion</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">les paramètres de gestion</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							@can ('Services')
							<li><a class="slide-item" href="{{ url('/' . $page='leaves') }}">Services</a></li>
							@endcan
							@can ('Equipes')

							<li><a class="slide-item" href="{{ url('/' . $page='products') }}">Equipes</a></li>
							@endcan
						</ul>
						
						@endcan
					</li>
					
						
					
					
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
