@extends('layout.app')
@section('hello')


<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

.container-form{
    left: 50px;
    top: 50px;
position: relative;
max-width: 700px;
width: 100%;
background: #fff;
padding: 25px;
border-radius: 8px;
box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
margin-left: 100px;
height: 440px;
}

.container-form header{
font-size: 1.5rem;
color: rgb(48, 58, 141);
font-weight: 500;
}

.container-form form{
position: relative;
margin-top: 16px;
min-height: 490px;
}
.container-form form .info{
margin-top: 30px;
}


.container-form form .fields{
display: flex;
align-items: center;
flex-wrap: wrap;

}
form .fields .input-field{
display: flex;
width: calc(100% / 2 - 15px);
flex-direction: column;
margin: 8px 0;
margin-left: 10px;
}
.input-field label{
font-size: 12px;
font-weight: 500;
color: rgb(36, 55, 147);
margin-left: 5px;
}
.input-field input{
outline: none;
font-size: 14px;
font-weight: 400;
color: #333;
border-radius: 8px;
border: 1px solid #000080;
padding: 0 15px;
height: 42px;
margin: 10px 0;
}
.input-field select{
outline: none;
font-size: 14px;
font-weight: 400;
color: #333;
border-radius: 8px;
border: 1px solid #000080;
padding: 0 15px;
height: 42px;
margin: 10px 0;
}
.input-field input:focus{
box-shadow: 0 3px 6px rgba(24, 74, 132, 0.13);
}
.input-field select:focus{
box-shadow: 0 3px 6px rgba(24, 74, 132, 0.13);
}
.btn {
color: rgb(17, 3, 108);
text-transform: uppercase;
text-decoration: none;
border: 2px solid rgb(17, 3, 108);
padding: 10px 20px;
font-size: 17px;
font-weight: bold;
background: transparent;
position: relative;
transition: all 1s;
overflow: hidden;
margin-top: 20px;
border-radius: 8px;
}

.btn:hover {
z-index: 100;
color: rgb(255, 255, 255);
}

.btn::before {
content: '';
position: absolute;
height: 100%;
width: 0%;
top: 0;
left: -40px;
transform: skewX(45deg);
background-color: rgb(34, 19, 131);
transition: all 1s;
z-index: -1;
}

.btn:hover::before {
width: 160%;
}
</style>
@if($errors->any())
    @foreach($errors->all() as $error)
    <script>
       Swal.fire({
            icon: "error",
            title: "Oops...",
            text: @json($error),
        });
    </script>
    @endforeach
@endif

@if(session('message'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Valid...",
            text: @json(session('message')),
        });
    </script>
@endif
</head>
<body>
<div class="container-form">
<header>Dépenses</header>
<form action="{{ route('formulaire.post') }}" method="POST" class="form">
    @csrf

    <div class="form first">
        <div class="info personal">

            <div class="fields">
                <div class="input-field">
                    <label>Nom d'Entreprise</label>
                    <select name="company">
                        <option hidden>Entreprise</option>
                        <option>Sofamel</option>
                        <option>Bitmar</option>
                        <option>Lux Lighting</option>
                        <option>Madin Technologies</option>
                        <option>Madin Immobilier</option>
                        {{-- <option>Marcont</option>
                        <option>Neoplus</option>
                        <option>Switch Electric</option>
                        <option>PEC Group</option> --}}
                    </select>
                </div>
                <div class="input-field">
                    <label>Budget</label>
        <input name="budget" type="number" placeholder="Budget(DH)" />
                </div>


                  <div class="input-field">
                    <label>Collaborateur</label>
                    <input name="collaborator" type="text" placeholder="Collaborateur" value="{{ Auth::user()->Username }}" readonly />
                </div>


                  {{-- <div class="input-field pro">
                    <label>Destination</label>
                    <input name="destination" type="text" placeholder="Destination" />
                </div> --}}

                <div class="input-field">
                    <label>Destination</label>
                    <select name="Destination">
                        <option hidden>Destination</option>
                        <option>Boznika</option>
                        <option>Cartiee indestriual medionna </option>
                        <option>Rabat</option>
                    </select>
                </div>

                        <div class="input-field pro">
                            <label>Date</label>
                            <input name="date" type="date" placeholder="Enter date" />
                        </div>
                        <div class="input-field pro">
                            <label>Description</label>
                <input name="description" type="text" placeholder="Description" />
                        </div>
                    </div>
                </div>
                <button class="btn">
                    Confirmer
                </button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
