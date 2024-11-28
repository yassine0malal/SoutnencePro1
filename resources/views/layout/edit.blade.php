@extends('layout.admin')
@section('admin')




  <style>
/* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");



.containerform {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
  margin-left: 100px;
  top: 150px;
    left: 50px;
}

.containerform header {
  font-size: 1.5rem;
  color:rgb(48, 58, 141);
  font-weight: 500;
}

.containerform .form {
  margin-top: 30px;
}

.form .input-box {
  width: 100%;
  margin-top: 20px;
}

.input-box label {
  color: rgb(36, 55, 147);
}

.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: rgb(0, 0, 0);
  margin-top: 8px;
  border: 1px solid#000080;
  border-radius: 6px;
  padding: 0 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.select-box:hover{
  color: #707070;
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

        <section class="containerform">
          <header>Entreprise solde</header>
          <form action="{{route('soldes.put',$solde->id)}}" method="POST" class="form">
            @csrf
            <h1> <small>Le solde actual est : </small><span style="color:red">{{$solde->solde}} </span><small>( remplir le shamp pour ajouter un autre  montant)</small></h1>
            @method('put')

            <div class="select-box">
              <select name="companyName" disabled>
                <option hidden>Entreprise</option>
                <option value="{{$solde->company}}" selected>{{$solde->company}}</option>
              </select>
            </div>

            <div class="input-box">
              <label>Nouveau Solde</label>
              <input name="solde" type="number" placeholder="crée le nouveau solde(DH)"  />
            </div>

            <button class="btn">
              Enregistrer
            </button>
          </form>
        </section>

@endsection
