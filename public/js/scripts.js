/*!
* Start Bootstrap - Blog Home v5.0.0 (https://startbootstrap.com/template/blog-home)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-blog-home/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
function z_cat(i){
    var help='/dane/'+i+'.txt';
    fetch(help)
    .then( response => {return response.text();} )
    .then( dane => { document.getElementById("zamiana").innerHTML = dane; });
}

function podmiana(a){
    if(a=="w1")
    {
       document.getElementById('jeden').innerHTML='Władca Pierścieni: Powrót Króla';
       document.getElementById('f1').value='Władca Pierścieni: Powrót Króla';
       document.getElementById('dwa').innerHTML='Piraci z Karaibów: Klątwa Czarnej Perły';
       document.getElementById('f2').value='Piraci z Karaibów: Klątwa Czarnej Perły';
       document.getElementById('trzy').innerHTML='Harry Potter i Czara Ognia';
       document.getElementById('f3').value='Harry Potter i Czara Ognia';
       document.getElementById('cztery').innerHTML='Gwiezdne wojny: część V – Imperium kontratakuje';
       document.getElementById('f4').value='Gwiezdne wojny: część V – Imperium kontratakuje';
       document.getElementById('piec').innerHTML='Król Artur: Legenda miecza';
       document.getElementById('f5').value='Król Artur: Legenda miecza';
    }
    if(a=="w2")
    {
       document.getElementById('jeden').innerHTML='Wielki Mike. The Blind Side';
       document.getElementById('f1').value='Wielki Mike. The Blind Sidea';
       document.getElementById('dwa').innerHTML='Nietykalni';
       document.getElementById('f2').value='Nietykalni';
       document.getElementById('trzy').innerHTML='Wilk z Wall Street';
       document.getElementById('f3').value='Wilk z Wall Street';
       document.getElementById('cztery').innerHTML='Pianista';
       document.getElementById('f4').value='Pianista';
       document.getElementById('piec').innerHTML='Bohemian Rhapsody';
       document.getElementById('f5').value='Bohemian Rhapsody';
    }
    if(a=="w3")
    {
       document.getElementById('jeden').innerHTML='Avengers: Wojna bez granic';
       document.getElementById('f1').value='Avengers: Wojna bez granic';
       document.getElementById('dwa').innerHTML='Powrót Batmana';
       document.getElementById('f2').value='Powrót Batmana';
       document.getElementById('trzy').innerHTML='Kapitan Ameryka: Wojna Bohaterów';
       document.getElementById('f3').value='Kapitan Ameryka: Wojna Bohaterów';
       document.getElementById('cztery').innerHTML='Avengers: Koniec gry';
       document.getElementById('f4').value='Avengers: Koniec gry';
       document.getElementById('piec').innerHTML='Mroczny Rycerz';
       document.getElementById('f5').value='Mroczny Rycerz';
    }
    if(a=="w4")
    {
       document.getElementById('jeden').innerHTML='Sami swoi';
       document.getElementById('f1').value='Sami swoi';
       document.getElementById('dwa').innerHTML='Dzień Świstaka';
       document.getElementById('f2').value='Dzień Świstaka';
       document.getElementById('trzy').innerHTML='Forrest Gump';
       document.getElementById('f3').value='Forrest Gump';
       document.getElementById('cztery').innerHTML='Kac Vegas';
       document.getElementById('f4').value='Kac Vegas';
       document.getElementById('piec').innerHTML='Praktykant';
       document.getElementById('f5').value='Praktykant';
    }
    if(a=="w5")
    {
       document.getElementById('jeden').innerHTML='John Wick';
       document.getElementById('f1').value='John Wick';
       document.getElementById('dwa').innerHTML='Olimp w ogniu';
       document.getElementById('f2').value='Olimp w ogniu';
       document.getElementById('trzy').innerHTML='Niezniszczalni';
       document.getElementById('f3').value='Niezniszczalni';
       document.getElementById('cztery').innerHTML='6 Underground';
       document.getElementById('f4').value='6 Underground';
       document.getElementById('piec').innerHTML='Mission: Impossible – Rogue Nation';
       document.getElementById('f5').value='Mission: Impossible – Rogue Nation';
    }
    if(a=="w6")
    {
       document.getElementById('jeden').innerHTML='Furia';
       document.getElementById('f1').value='Furia';
       document.getElementById('dwa').innerHTML='Snajper';
       document.getElementById('f2').value='Snajper';
       document.getElementById('trzy').innerHTML='Bękarty wojny';
       document.getElementById('f3').value='Bękarty wojny';
       document.getElementById('cztery').innerHTML='Szyfry wojny';
       document.getElementById('f4').value='Szyfry wojny';
       document.getElementById('piec').innerHTML='Pearl Harbor';
       document.getElementById('f5').value='Pearl Harbor';
    }
}
