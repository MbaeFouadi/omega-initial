<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:38:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/Omega-logo.png">
    <title>Omega</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="src/css/vendors_css.css">

    <!-- Style-->
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/skin_color.css">

</head>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">
        <!-- <div id="loader"></div> -->



        @include("include.header")
        @include("include.aside")
        <div class="content-wrapper">
            <div class="container-full">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>

                <!-- Main content -->
                <section class="content">

                    <div class="row">

                        <div class="col-md-12">
                            <div class="box">

                                <div class="box-header">
                                    <h4 class="box-title ">Préinscription</h4>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <section id="xd" sec="222">
                                        @isset($messages)
                                        <div class="alert alert-danger">{{ $messages }}</div>
                                        @endisset
                                        @isset($data)


                                        @if($data->type_bac==1 && $data->annee >= 2010 )
                                        <div id="info" sec="1">
                                            <form action="{{route('update_info')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div id='erreur'></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">{{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" name="type_preinscription1" id="type_preinscription1" style="width: 100%;" required>
                                                                <option value="{{$preins->id}}">{{$preins->design_preins}}</option>
                                                                @foreach ($preine as $prein )
                                                                <option value="{{$prein->id}}">{{$prein->design_preins}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if($data->type_preins_id==2 || $data->type_preins_id==3)
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('matricule')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Matricule </label>
                                                            <input type="text" class="form-control" id="matricule" name="matricule" value="{{$data->matricule}}" >
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" name="preinscription1" id="preinscription1" style="width: 100%;" required>

                                                                <option value="{{$recu->id_type}}" >{{$recu->nom_type}}</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="lastName1" class="form-label">Image <span class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" id="image" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName5" class="form-label">Nom </label>
                                                            <input type="text" class="form-control" id="nom" name="nom" value="{{$data->nom}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1" class="form-label">Prénom </label>
                                                            <input type="text" class="form-control" id="prenom" name="prenom" value="{{$data->prenom}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress1" class="form-label">Date de naissance </label>
                                                            <input type="text" class="form-control" id="date_naissance" name="date_naissance" disabled value="{{$data->date_naiss}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1" class="form-label">Lieu de naissance </label>
                                                            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" disabled value="{{$data->lieu_naiss}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('sexe')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span> </label>
                                                            <select name="sexe" data-validation-required-message="Ce champ est obligatoire" id="sexe" class="form-control" required>
                                                                <option value="{{$data->sexe}}">{{$data->sexe}}</option>
                                                                <option value="M">M</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('adresse')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" data-validation-required-message="Ce champ est obligatoire" class="form-label">Adresse <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="adresse" id="adresse" value="{{$data->adresse_cand}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('pays')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
                                                            <select name="pays" id="pays" data-validation-required-message="Ce champ est obligatoire" class="form-control" required>
                                                                <option value="{{$data->pays}}">{{$data->pays}}</option>
                                                                @foreach ($pays as $pay )
                                                                <option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('telephone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" data-validation-required-message="Ce champ est obligatoire" value="{{$data->tel_mobile}}" name="telephone" id="telephone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline1" class="form-label">Série </label>
                                                            <input type="text" class="form-control" id="serie" name="serie" value="{{$data->serie}}" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline2" class="form-label">Mention </label>
                                                            <input type="text" class="form-control" id="mention" name="mention" value="{{$data->mention}}" disabled required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline1" class="form-label">Centre </label>
                                                            <input type="text" class="form-control" id="centre" name="centre" value="{{$data->centre}}" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline2" class="form-label">Année d'obtention </label>
                                                            <input type="text" class="form-control" id="annee" name="annee" disabled value="{{$bachelier->annee}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline1" class="form-label">Numéro d'attestation </label>
                                                            <input type="text" class="form-control" id="num_attest" value="{{$data->num_attest}}" disabled required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="button">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrer">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                        @elseif($data->type_bac==1 && $data->annee <= 2010 ) <div id="info" sec="1">
                                            <form action="{{route('update_info')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div id='erreur'></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('nin')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Nin <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->nin}}" class="form-control" name="nin" id="nin" required data-validation-required-message="Ce champ est obligatoire">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">{{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" name="type_preinscription2" id="type_preinscription2" style="width: 100%;" required>
                                                                <option value="{{$preins->id}}">{{$preins->design_preins}}</option>
                                                                @foreach ($preine as $prein )
                                                                <option value="{{$prein->id}}">{{$prein->design_preins}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" style="width: 100%;" required data-validation-required-message="Ce champ est obligatoire" name="preinscription2" id="preinscription2">
                                                                <option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
                                                                @foreach ($type_recu as $recu )
                                                                <option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="lastName1" class="form-label">Image <span class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="image" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('nom')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">Nom <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->nom}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="nom" name="nom" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('prenom')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="lastName1" class="form-label">Prénom <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->prenom}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="prenom" name="prenom" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('date_naissance')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="emailAddress1" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                                            <input type="date" value="{{$data->date_naiss}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="date_naissance" name="date_naissance" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('lieu_naissance')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="phoneNumber1" class="form-label">Lieu de naissance <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->lieu_naiss}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="lieu_naissance" name="lieu_naissance" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('sexe')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span></label>
                                                            <select name="sexe" id="sexe" data-validation-required-message="Ce champ est obligatoire" class="form-control" required>
                                                                <option value="{{$data->sexe}}">{{$data->sexe}}</option>
                                                                <option value="M">M</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('adresse')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Adresse <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->adresse_cand}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="adresse" id="adresse" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('pays')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
                                                            <select name="pays" id="pays" class="form-control" data-validation-required-message="Ce champ est obligatoire" required>
                                                                <option value="{{$data->pays}}">{{$data->pays}}</option>

                                                                <option value="">Sélectionner le pays</option>
                                                                @foreach ($pays as $pay )
                                                                <option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('telephone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->tel_mobile}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" name="telephone" id="telephone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('serie')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Série <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->serie}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="serie" name="serie" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('mention')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Mention <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->mention}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="mention" name="mention" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('centre')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Centre <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->centre}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="centre" name="centre" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('annee')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Année d'obtention</label>
                                                            <input type="text" class="form-control" id="annee" name="annee" value="{{$data->annee}}" disabled required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('num_attest')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Numéro d'attestation <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->num_attest}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="num_attest" id="num_attest" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="button">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrez">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                </div>
                                @elseif( $data->type_bac==2)
                                <div id="info" sec="1">
                                <form action="{{route('update_info')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div id='erreur'></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('nin')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Nin <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->nin}}" class="form-control" name="nin" id="nin" required data-validation-required-message="Ce champ est obligatoire">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">{{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" data-validation-required-message="Ce champ est obligatoire" name="type_preinscription2" id="type_preinscription2" style="width: 100%;" required>
                                                                <option value="{{$preins->id}}">{{$preins->design_preins}}</option>
                                                                @foreach ($preine as $prein )
                                                                <option value="{{$prein->id}}">{{$prein->design_preins}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('type_preinscription')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">Types de {{$preins->design_preins}} <span class="text-danger">*</span></label>
                                                            <select class="form-control select2" style="width: 100%;" required data-validation-required-message="Ce champ est obligatoire" name="preinscription2" id="preinscription2">
                                                                <option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
                                                                @foreach ($type_recu as $recu )
                                                                <option value="{{$recu->id_type}}">{{$recu->nom_type}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('image')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="lastName1" class="form-label">Image <span class="text-danger">*</span></label>
                                                            <input type="file" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="image" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('nom')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="firstName5" class="form-label">Nom <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->nom}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="nom" name="nom" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('prenom')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="lastName1" class="form-label">Prénom <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->prenom}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="prenom" name="prenom" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('date_naissance')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="emailAddress1" class="form-label">Date de naissance <span class="text-danger">*</span></label>
                                                            <input type="date" value="{{$data->date_naiss}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="date_naissance" name="date_naissance" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('lieu_naissance')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="phoneNumber1" class="form-label">Lieu de naissance <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->lieu_naiss}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" id="lieu_naissance" name="lieu_naissance" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('sexe')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Sexe <span class="text-danger">*</span></label>
                                                            <select name="sexe" id="sexe" data-validation-required-message="Ce champ est obligatoire" class="form-control" required>
                                                                <option value="{{$data->sexe}}">{{$data->sexe}}</option>
                                                                <option value="M">M</option>
                                                                <option value="F">F</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('adresse')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Adresse <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->adresse_cand}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="adresse" id="adresse" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('pays')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Pays <span class="text-danger">*</span></label>
                                                            <select name="pays" id="pays" class="form-control" data-validation-required-message="Ce champ est obligatoire" required>
                                                                <option value="{{$data->pays}}">{{$data->pays}}</option>

                                                                <option value="">Sélectionner le pays</option>
                                                                @foreach ($pays as $pay )
                                                                <option value="{{$pay->nom_fr_fr}}">{{$pay->nom_fr_fr}}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('telephone')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Téléphone <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->tel_mobile}}" class="form-control" data-validation-required-message="Ce champ est obligatoire" name="telephone" id="telephone" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('serie')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Série <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->serie}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="serie" name="serie" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('mention')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Mention <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->mention}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="mention" name="mention" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('centre')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Centre <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->centre}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" id="centre" name="centre" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('annee')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline2" class="form-label">Année d'obtention</label>
                                                            <input type="text" class="form-control" id="annee" name="annee" value="{{$data->annee}}" disabled required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            @error('num_attest')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label for="addressline1" class="form-label">Numéro d'attestation <span class="text-danger">*</span></label>
                                                            <input type="text" value="{{$data->num_attest}}" data-validation-required-message="Ce champ est obligatoire" class="form-control" name="num_attest" id="num_attest" required>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row" id="button">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="submit" class="form-control btn-success" id="addressline1" value="Enregistrez">
                                                        </div>
                                                    </div>

                                                </div>
                                            </form>
                                </div>
                                @else

                                @endif
                                @endisset

                </section>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>


    <!-- ./col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    </div>
    </div>



    <script src="//code.jquery.com/jquery.js"></script>
    <script src="src/js/jquery.min.js"></script>

    <!-- Vendor JS -->
    <script src="src/js/vendors.min.js"></script>
    <script src="src/js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>
    <script src="assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
    <script src="assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
    <script src="assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <!-- CRMi App -->
    <script src="src/js/template.js"></script>

    <script src="src/js/pages/steps.js"></script>

    <script>
        $(document).ready(function() {

            $("#type_preinscription1").change(function() {
                var preins = $(this).val();

                $.ajax({
                    type: "POST",

                    url: "{{route('getPreins1')}}",
                    data: {
                        preins: preins,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(preins);
                        if (res) {
                            $("#preinscription1").empty();

                            $.each(res, function(key, value) {
                                $("#preinscription1").append('<option value="' + key + '">' + value + '</option>');
                            });



                        } else {
                            // $("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

                        }
                    },

                    error: function() {

                        $("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

                    }
                });

            });

            $("#type_preinscription2").change(function() {
                var preins = $(this).val();

                $.ajax({
                    type: "POST",

                    url: "{{route('getPreins2')}}",
                    data: {
                        preins: preins,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(preins);
                        if (res) {
                            $("#preinscription2").empty();

                            $.each(res, function(key, value) {
                                $("#preinscription2").append('<option value="' + key + '">' + value + '</option>');
                            });



                        } else {
                            // $("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

                        }
                    },

                    error: function() {

                        $("#error").append("<div class='text-danger'>Nin incorrecte veuillez saisir le nin conforme à votre relevet du bac ou attestation</div>");

                    }
                });

            });
        });
    </script>



</body>

<!-- Mirrored from crm-admin-dashboard-template.multipurposethemes.com/university/vertical/main/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Feb 2023 11:39:38 GMT -->

</html>