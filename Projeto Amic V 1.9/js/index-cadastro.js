function estadoAlunoCadastro() {
    document.getElementById('aba-tecnico-cadastro').classList.remove('activated')
    document.getElementById('aba-aluno-cadastro').classList.add('activated')
    document.getElementById('aluno-cadastro').classList.remove('hide')
    document.getElementById('tecnico-cadastro').classList.add('hide')
}

function estadoTecnicoCadastro() {
    document.getElementById('aba-tecnico-cadastro').classList.add('activated')
    document.getElementById('aba-aluno-cadastro').classList.remove('activated')
    document.getElementById('tecnico-cadastro').classList.remove('hide')
    document.getElementById('aluno-cadastro').classList.add('hide')
}