@extends('layout.app')
@section('hello')


  <style>


@media print {
 .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
 }
}





main.table {

    height: 90vh;
    margin-left: 10px;
    margin-top: 40px;

    backdrop-filter: blur(7px);

    border-radius: .8rem;

    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: #fffb;

    margin: .8rem auto;
    border-radius: .6rem;
    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{
    visibility: visible;
}


table {
    width: 100%;
}

td img {
    width: 36px;
    height: 36px;

    border-radius: 50%;
    margin-right: .5rem;
    vertical-align: middle;
}

table, th, td {
    border-collapse: collapse;
    padding: 1rem;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color:rgb(18,29,96);
    cursor: pointer;
    z-index: 1;
    color: #fff;
    text-transform: capitalize;
}


tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
    }

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;

    text-align: center;
    font-size: 1rem;

    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #000000;
}

thead th:hover {
    color: #ffffff;
}
.btn {
  padding: 17px 15px;
  border-radius: 50px;
  cursor: pointer;
  border: 0;
  background-color: white;
  box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: 10px;
  transition: all 0.5s ease;
}

.btn:hover {
  letter-spacing: 3px;
  background-color: #08145a;
  color: hsl(0, 0%, 100%);
  box-shadow: #08145a 0px 7px 29px 0px;
}

.btn:active {
  letter-spacing: 3px;
  background-color:  #08145a;
  color: hsl(0, 0%, 100%);
  box-shadow: #08145a 0px 0px 0px;
  transform: translateY(10px);
  transition: 100ms;
}


.button {
  position: relative;
  width: 150px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid  #08145a;
  background-color:  #08145a;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #08145a;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 30px;
  stroke: #fff;
}

.button:hover {
  background: white;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #08145a;
}

.button:active {
  border: 1px solid #08145a;
}

.href{
    text-decoration: none
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
        icon: "error",
        title: "supprimer...",
        text: @json(session('message')),
    });
</script>
@endif


    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Demande</h1>
            <a href="{{ route('formulaire') }}" class="href">
                <button type="button" class="button">
                    <span class="button__text">Ajouter</span>
                    <span class="button__icon">
                        <svg  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg>
                    </span>
                </button>
            </a>
        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr class="content">
                        <th>Entreprise</th>
                        <th>Budget</th>
                        <th>Date</th>
                        <th>Destination</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if(auth()->check())
                    @foreach($formulaires as $formulaire)
                    @if(auth()->user()->id === $formulaire->profil_id)
                        <tr>
                            <td>{{ $formulaire->company }}</td>
                            <td>{{ $formulaire->budget }}</td>
                            <td>{{ $formulaire->date }}</td>
                            <td>{{ $formulaire->destination }}</td>

                            <td>
                                @if($formulaire->is_validated==false)
                                <form action="{{ route('edit', $formulaire->id) }}" method="get">
                                    @csrf
                                    <button class="btn">Modifier</button>
                                </form>
                               @else
                               <form action="{{ route('pdf', $formulaire->id) }}" method="get">
                                @csrf
                                <button class="btn">Télécharger</button>
                            </form>
                               @endif
                            </td>
                            <td>
                                @if($formulaire->is_validated==false)
                                <form action="{{ route('drop.request', $formulaire->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn">Supprimer</button>
                                </form>
                               @endif
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </section>
    </main>

    @endsection
