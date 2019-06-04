function validerForNavn()
{
    fornavn = $("#fornavn").val();
    regEx =  /^[a-zA-ZøæåØÆÅ.]{2,20}$/;
    ok = regEx.test(fornavn);
    console.log(ok + "  : " + "fornavn")
    if(!ok)
    {
        document.getElementById("feilForNavn").innerHTML=
                "Feil i navnet.";
        return false;
    }
    document.getElementById("feilForNavn").innerHTML="";
    return true;
}

function validerEtterNavn()
{
    etternavn = $("#etternavn").val();
    regEx =  /^[a-zA-ZøæåØÆÅ.] {2,20}$/;
    ok = regEx.test(etternavn);
    if(!ok)
    {
        document.getElementById("feilEtterNavn").innerHTML=
                "Feil i navnet.";
        return false;
    }
    document.getElementById("feilEtterNavn").innerHTML="";
    return true;
}

function validerEpost()
{
    epost = $("#epost").val();
    regEx = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    ok = regEx.test(epost);
    if(!ok)
    {
        document.getElementById("feilEpost").innerHTML=
                "Feil i epost.";
        return false;
    }
    document.getElementById("feilEpost").innerHTML="";
    return true;
}

function validerBrukerNavn()
{
    brukernavn = $("#brukernavn").val();
    regEx = /^[a-zA-Z.] {2,20}$/;
    ok = regEx.test(brukernavn);
    if(!ok)
    {
        document.getElementById("feilBrukerNavn").innerHTML=
                "Feil i brukernavnet.";
        return false;
    }
    document.getElementById("feilBukerNavn").innerHTML="";
    return true;
}

function validerPassord()
{
    passord = $("#passord").val();
    regEx = /^[a-zA-Z0-9.] {8,20}$/;
    ok = regEx.test(passord);
    if(!ok)
    {
        document.getElementById("feilPassord").innerHTML=
                "Feil i passordet. </br> \n\
                Passordet må ha minimum 8 tegn og skal bestå av både bokstaver (a-z/ A-Z) og tall (0-9).";
        return false;
    }
    document.getElementById("feilPassord").innerHTML="";
    return true;
}
            
function validerAlle(){
    okFNavn = validerForNavn();
    okENavn = validerEtterNavn();
    okEpost = validerEpost();
    okBNavn = validerBrukerNavn();
    okPassord = validerPassord();

    if(okFNavn && okENavn && okEpost && okBNavn && okPassord)
    {
        return true;
    }
    return false;
}