@extends('layouts.app')

@section('content')
<div class="index-container">
    <div class="search-bar">
        <label for="search">Søk etter sted</label>
        <input type="text" id="search" placeholder="Barcelona">
    </div>
    <div class="city-section-popular">
        <h2>Populære byer</h2>
        <table class="city-table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Trondheim</td>
                    <td class="trondheim"></td>
                    <td class="trondheim"></td>
                    <td class="trondheim"></td>
                </tr>
                <tr>
                    <td>Ålesund</td>
                    <td class="alesund"></td>
                    <td class="alesund"></td>
                    <td class="alesund"></td>
                </tr>
                <tr>
                    <td>Oslo</td>
                    <td class="oslo"></td>
                    <td class="oslo"></td>
                    <td class="oslo"></td>
                </tr>
                <tr>
                    <td>Bergen</td>
                    <td class="bergen"></td>
                    <td class="bergen"></td>
                    <td class="bergen"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="city-section-favorites">
        <h2>Dine favoritter</h2>
        <table class="city-table">
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset('js/index.js') }}"></script>
@endsection
