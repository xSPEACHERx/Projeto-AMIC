function estadoAlunoLogin() {
    document.getElementById('aba-tecnico-login').classList.remove('activated')
    document.getElementById('aba-aluno-login').classList.add('activated')
    document.getElementById('aluno-login').classList.remove('hide')
    document.getElementById('tecnico-login').classList.add('hide')
}

function estadoTecnicoLogin() {
    document.getElementById('aba-tecnico-login').classList.add('activated')
    document.getElementById('aba-aluno-login').classList.remove('activated')
    document.getElementById('tecnico-login').classList.remove('hide')
    document.getElementById('aluno-login').classList.add('hide')
}