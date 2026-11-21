<?php
require __DIR__ . '/config.php';
require_login();
$user = current_user();
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>NorthMind — Teste Profissional com IA</title>
<style>
:root{--bg:#F7F5F0;--card:#fff;--tx:#2D3748;--mut:#4A5568;--ac:#2C4A52;--ac2:#5E8372;--bd:#D9DEE5;--on:#fff;--sh:0 4px 20px rgba(44,74,82,.12);box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px)}
@media(prefers-color-scheme:dark){:root:not([data-theme="light"]){--bg:#0f1a1d;--card:#17262a;--tx:#E8EEF0;--mut:#A9B8BC;--ac:#8FC1CC;--ac2:#A8C4B4;--bd:#2a3d42;--on:#0f1a1d}}
:root[data-theme="dark"]{--bg:#0f1a1d;--card:#17262a;--tx:#E8EEF0;--mut:#A9B8BC;--ac:#8FC1CC;--ac2:#A8C4B4;--bd:#2a3d42;--on:#0f1a1d}
:root[data-cb="1"]{--ac:#0072B2;--ac2:#D55E00}
:root[data-theme="dark"][data-cb="1"]{--ac:#56B4E9;--ac2:#E69F00}
html{font-size:100%;scroll-behavior:smooth;scroll-padding-top:5rem}
*{box-sizing:border-box;margin:0;padding:0}
body{background:var(--bg);color:var(--tx);font-family:system-ui,-apple-system,"Segoe UI",Roboto,sans-serif;line-height:1.65}
h1,h2,h3{font-family:Georgia,"Times New Roman",serif;color:var(--ac);line-height:1.15}
a{color:inherit}
:focus-visible{outline:3px solid var(--ac2);outline-offset:2px}
nav{position:sticky;top:0;z-index:20;background:var(--bg);border-bottom:1px solid var(--bd);display:flex;align-items:center;gap:.75rem;padding:.7rem 1.25rem;flex-wrap:wrap}
.logo{font-family:Georgia,serif;font-weight:700;font-size:1.35rem;color:var(--ac);margin-right:auto;text-decoration:none}
.logo span{color:var(--ac2)}
nav a.l{text-decoration:none;font-size:.95rem;color:var(--mut)}
nav a.l:hover{color:var(--ac)}
.ib{background:var(--card);color:var(--ac);border:1.5px solid var(--bd);border-radius:999px;padding:.45rem .9rem;font:inherit;font-size:.9rem;cursor:pointer}
.ib:hover{border-color:var(--ac)}
.btn{background:var(--ac);color:var(--on);border:0;border-radius:999px;padding:.85rem 1.8rem;font:inherit;font-weight:600;cursor:pointer}
.btn:hover{filter:brightness(1.1)}
.btn.g{background:transparent;color:var(--ac);border:1.5px solid var(--ac)}
section{padding:4.5rem 1.25rem}
.w{max-width:1000px;margin:0 auto}
.lab{font-size:.75rem;letter-spacing:.14em;text-transform:uppercase;font-weight:700;color:var(--ac2);margin-bottom:.6rem}
.hero{text-align:center;padding-top:5rem}
.hero h1{font-size:clamp(2.4rem,7vw,4.5rem);max-width:760px;margin:0 auto 1.2rem}
.hero h1 em{color:var(--ac2)}
.hero p{max-width:540px;margin:0 auto 2rem;color:var(--mut);font-size:1.1rem}
.sobre{background:var(--card);border-block:1px solid var(--bd)}
.sobre blockquote{font-family:Georgia,serif;font-size:clamp(1.3rem,3vw,1.9rem);color:var(--ac);max-width:760px;line-height:1.4;border-left:4px solid var(--ac2);padding-left:1.2rem}
.steps{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;margin-top:2rem}
.steps div{background:var(--bg);border:1px solid var(--bd);border-radius:14px;padding:1.2rem}
.steps b{display:block;color:var(--ac);margin-bottom:.3rem}
.qc{max-width:680px;margin:0 auto;background:var(--card);border:1px solid var(--bd);border-radius:20px;padding:2rem;box-shadow:var(--sh)}
.bar{height:8px;background:var(--bd);border-radius:9px;overflow:hidden;margin:.6rem 0 1.5rem}
.bar i{display:block;height:100%;background:var(--ac2);width:0;transition:width .4s}
.qc h3{font-size:1.4rem;margin-bottom:1.1rem}
.opt{display:block;width:100%;text-align:left;background:var(--bg);color:var(--tx);border:1.5px solid var(--bd);border-radius:12px;padding:.9rem 1rem;margin-bottom:.6rem;font:inherit;cursor:pointer}
.opt:hover,.opt[aria-pressed=true]{border-color:var(--ac);background:var(--card)}
.opt[aria-pressed=true]{box-shadow:inset 4px 0 0 var(--ac);font-weight:600}
.opt small{display:block;font-weight:400;color:var(--mut)}
.sc{display:flex;gap:.5rem}
.sc .opt{text-align:center;margin:0;padding:.9rem 0}
.scl{display:flex;justify-content:space-between;gap:1rem;font-size:.85rem;color:var(--mut);margin-top:.6rem}
textarea{width:100%;min-height:150px;font:inherit;padding:.8rem 1rem;border:1.5px solid var(--bd);border-radius:12px;background:var(--bg);color:var(--tx);resize:vertical}
.nv{display:flex;justify-content:space-between;margin-top:1.2rem}
.nv .btn:disabled{opacity:.4;cursor:not-allowed}
.hid{display:none!important}
.think{text-align:center;padding:3rem 1rem;color:var(--mut)}
.res{background:var(--ac);color:var(--on);border-radius:20px;padding:2rem;margin-bottom:1.5rem}
.res h2{color:var(--on);font-size:clamp(1.8rem,5vw,2.8rem);margin:.3rem 0}
.res .lab{color:var(--on);opacity:.8}
.mt{display:flex;align-items:center;gap:.8rem;margin:1rem 0}
.mt .bar{flex:1;margin:0;background:rgba(127,127,127,.35)}
.mt .bar i{background:var(--on)}
.chips{display:flex;gap:.5rem;flex-wrap:wrap;margin-top:.8rem}
.chip{border:1.5px solid var(--bd);border-radius:999px;padding:.3rem .8rem;font-size:.85rem;background:var(--card);color:var(--mut)}
.two{display:grid;grid-template-columns:1fr 1.2fr;gap:1.2rem;margin-top:1.5rem}
@media(max-width:760px){.two{grid-template-columns:1fr}}
.box{background:var(--card);border:1px solid var(--bd);border-radius:16px;padding:1.4rem}
.box h3{font-size:1.2rem;margin-bottom:.8rem}
.crs{list-style:none}
.crs li{padding:.55rem 0;border-bottom:1px solid var(--bd)}
.crs li:last-child{border:0}
.crs small{display:block;color:var(--mut)}
#map{width:100%;height:auto;background:var(--bg);border-radius:12px;border:1px solid var(--bd)}
#map .br{fill:var(--card);stroke:var(--ac);stroke-width:1.5}
#map .pt{fill:var(--ac2);stroke:var(--card);stroke-width:2;cursor:pointer}
#map .pt.on,#map .pt:hover{fill:var(--ac);r:12}
#map text{font-size:11px;font-weight:700;fill:var(--on);pointer-events:none;text-anchor:middle}
#map .me{fill:#c0392b;stroke:#fff;stroke-width:2}
:root[data-cb="1"] #map .me{fill:none;stroke:var(--tx);stroke-width:3}
.uni{display:flex;gap:.7rem;padding:.7rem;border:1.5px solid var(--bd);border-radius:12px;margin-top:.6rem;cursor:pointer;background:var(--bg)}
.uni.on{border-color:var(--ac);background:var(--card)}
.uni .n{flex:none;width:1.7rem;height:1.7rem;border-radius:50%;background:var(--ac2);color:var(--on);display:grid;place-items:center;font-weight:700;font-size:.85rem}
.uni small{color:var(--mut);display:block}
.uni a{font-size:.85rem;color:var(--ac);font-weight:600}
.loc{display:flex;gap:.6rem;flex-wrap:wrap;align-items:center;margin-top:1rem;font-size:.9rem;color:var(--mut)}
select{font:inherit;padding:.4rem .6rem;border-radius:8px;border:1.5px solid var(--bd);background:var(--card);color:var(--tx)}
.note{font-size:.82rem;color:var(--mut);margin-top:.8rem}
#ap{position:fixed;top:0;right:0;bottom:0;width:min(340px,92vw);background:var(--card);border-left:1px solid var(--bd);box-shadow:var(--sh);z-index:50;padding:calc(1.5rem + env(safe-area-inset-top,0px)) 1.5rem 1.5rem;transform:translateX(105%);transition:transform .3s;overflow:auto}
#ap.open{transform:none}
#ap h2{font-size:1.4rem;margin-bottom:1rem}
#ap .row{display:flex;gap:.5rem;flex-wrap:wrap;margin:.4rem 0 1.2rem}
#ap .ib[aria-pressed=true]{background:var(--ac);color:var(--on);border-color:var(--ac)}
#ap h3{font-size:1rem;font-family:system-ui,sans-serif;color:var(--tx)}
footer{text-align:center;padding:2rem 1rem;color:var(--mut);font-size:.85rem;border-top:1px solid var(--bd)}
@media(prefers-reduced-motion:reduce){*{transition:none!important;scroll-behavior:auto!important}}
</style>
</head>
<body>
<nav aria-label="Principal">
  <a class="logo" href="#inicio">North<span>Mind</span></a>
  <a class="l" href="#sobre">Sobre</a>
  <a class="l" href="#teste">Teste</a>
  <button class="ib" id="thB" aria-label="Alternar modo claro e escuro">🌙 Modo escuro</button>
  <span class="ib" style="cursor:default">👤 <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></span>
  <a class="ib" href="logout.php" style="text-decoration:none">Sair</a>
  <button class="ib" id="apB" aria-expanded="false" aria-controls="ap"> Acessibilidade</button>
</nav>

<aside id="ap" aria-label="Opções de acessibilidade">
  <h2>Acessibilidade</h2>
  <h3>Tamanho das letras</h3>
  <div class="row">
    <button class="ib" id="fm" aria-label="Diminuir letras">A−</button>
    <button class="ib" id="fr" aria-label="Tamanho padrão">A</button>
    <button class="ib" id="fp" aria-label="Aumentar letras">A+</button>
  </div>
  <h3>Daltonismo</h3>
  <div class="row">
    <button class="ib" id="cb" aria-pressed="false">Paleta para daltonismo</button>
  </div>
  <p class="note" style="margin:0 0 1.2rem">Troca as cores por azul e laranja, distinguíveis em protanopia, deuteranopia e tritanopia. Nada depende só de cor.</p>
  <h3>Tema</h3>
  <div class="row">
    <button class="ib" data-th="light" aria-pressed="false">☀️ Claro</button>
    <button class="ib" data-th="dark" aria-pressed="false">🌙 Escuro</button>
  </div>
  <button class="btn g" id="apX">Fechar</button>
</aside>

<main id="inicio">
<section class="hero">
  <div class="lab">Teste profissional com IA</div>
  <h1>Encontre o caminho que combina com <em>você</em></h1>
  <p>Responda 6 perguntas rápidas ou 20 perguntas complexas, descubra a profissão mais alinhada ao seu perfil e veja cursos e faculdades perto de você.</p>
  <button class="btn" id="go">Começar o teste</button>
</section>

<section class="sobre" id="sobre">
  <div class="w">
    <div class="lab">A ideia do NorthMind</div>
    <blockquote>O NorthMind é um teste Profissional guiado por inteligência artificial que analisa suas respostas e revela os caminhos profissionais mais alinhados com quem você realmente é.</blockquote>
    <div class="steps">
      <div><b>1. Responda</b>Perguntas rápidas ou completas sobre seus interesses e jeito de trabalhar.</div>
      <div><b>2. Descubra</b>A IA indica a profissão que mais combina com você.</div>
      <div><b>3. Explore</b>Veja cursos, faculdades e onde elas ficam no mapa.</div>
    </div>
  </div>
</section>

<section id="teste">
  <div class="w">
    <div class="qc" id="md">
      <div class="lab">Escolha seu teste</div>
      <h3>Quanto tempo você tem agora?</h3>
      <button class="opt" id="m6"><b>Teste rápido</b><small>6 perguntas de múltipla escolha · cerca de 1 minuto</small></button>
      <button class="opt" id="m20"><b>Teste completo</b><small>20 perguntas objetivas e dissertativas · cerca de 10 minutos · resultado mais preciso</small></button>
      <p class="note">As respostas são enviadas à IA apenas para gerar o seu resultado.</p>
    </div>
    <div class="qc hid" id="qc">
      <div class="lab" id="qn">Pergunta 1 de 6</div>
      <div class="bar"><i id="pb"></i></div>
      <h3 id="qt"></h3>
      <div id="qo"></div>
      <div class="nv"><button class="btn g" id="bk">Voltar</button><button class="btn" id="nx" disabled>Próxima</button></div>
    </div>
    <div class="think hid" id="th" role="status"><h3>Analisando suas respostas…</h3><p>A IA do NorthMind está cruzando seu perfil com as carreiras.</p></div>
    <div class="hid" id="rs">
      <div class="res" aria-live="polite">
        <div class="lab">Profissão que mais combina com você</div>
        <h2 id="rt"></h2>
        <div class="mt"><div class="bar"><i id="rb"></i></div><b id="rp"></b></div>
        <p id="rd"></p>
      </div>
      <div class="lab">Outras possibilidades</div>
      <div class="chips" id="rc"></div>
      <div class="two">
        <div class="box"><h3>Cursos indicados</h3><ul class="crs" id="cr"></ul></div>
        <div class="box"><h3>Faculdades no mapa</h3>
          <svg id="map" viewBox="0 0 400 400" role="img" aria-label="Mapa esquemático do Brasil com as faculdades"></svg>
          <div class="loc"><span id="ls">Localização: não informada</span><button class="ib" id="lb">📍 Usar minha localização</button>
            <label>ou estou em <select id="lc"><option value="">escolher…</option></select></label></div>
        </div>
      </div>
      <div class="box" style="margin-top:1.2rem"><h3>Faculdades <span id="ln" style="font-weight:400;font-size:.9rem;color:var(--mut)"></span></h3><div id="ul"></div>
        <p class="note">Mapa esquemático, só para ter noção de distância. Confira cursos, vagas e processos seletivos no site oficial de cada instituição.</p></div>
      <div style="margin-top:1.5rem;text-align:center"><button class="btn g" id="rt2">Refazer o teste</button></div>
    </div>
  </div>
</section>
</main>
<footer>NorthMind · © 2026 NorthMind. Todos os direitos reservados.</footer>

<script>
var D=document,R=D.documentElement,$=function(i){return D.getElementById(i)};
function sv(k,v){try{localStorage.setItem(k,v)}catch(e){}}
function ld(k){try{return localStorage.getItem(k)}catch(e){return null}}

/* DADOS: instituições [nome, cidade, lat, lon, site] */
var U={usp:["USP","São Paulo, SP",-23.56,-46.73,"https://www.usp.br"],unicamp:["Unicamp","Campinas, SP",-22.82,-47.07,"https://www.unicamp.br"],bauru:["UNESP Bauru","Bauru, SP",-22.35,-49.03,"https://www.bauru.unesp.br"],ufscar:["UFSCar","São Carlos, SP",-21.98,-47.88,"https://www.ufscar.br"],ufrj:["UFRJ","Rio de Janeiro, RJ",-22.86,-43.23,"https://ufrj.br"],ufmg:["UFMG","Belo Horizonte, MG",-19.87,-43.96,"https://ufmg.br"],unb:["UnB","Brasília, DF",-15.76,-47.87,"https://www.unb.br"],ufrgs:["UFRGS","Porto Alegre, RS",-30.07,-51.12,"https://www.ufrgs.br"],ufpe:["UFPE","Recife, PE",-8.05,-34.95,"https://www.ufpe.br"],ufba:["UFBA","Salvador, BA",-13.0,-38.51,"https://ufba.br"],ufpr:["UFPR","Curitiba, PR",-25.45,-49.23,"https://www.ufpr.br"],ufsc:["UFSC","Florianópolis, SC",-27.6,-48.52,"https://ufsc.br"],ufc:["UFC","Fortaleza, CE",-3.74,-38.54,"https://www.ufc.br"],ufam:["UFAM","Manaus, AM",-3.09,-59.97,"https://ufam.edu.br"],
fgv:["FGV","São Paulo, SP",-23.56,-46.66,"https://portal.fgv.br"],insper:["Insper","São Paulo, SP",-23.6,-46.68,"https://www.insper.edu.br"],esalq:["USP · ESALQ","Piracicaba, SP",-22.71,-47.63,"https://www.esalq.usp.br"],ufv:["UFV","Viçosa, MG",-20.76,-42.87,"https://www.ufv.br"],ufla:["UFLA","Lavras, MG",-21.23,-44.98,"https://ufla.br"],senac:["Senac-SP","São Paulo, SP",-23.55,-46.64,"https://www.sp.senac.br"],senai:["SENAI-SP","São Paulo, SP",-23.55,-46.63,"https://www.sp.senai.br"],ifsp:["IFSP","São Paulo, SP",-23.53,-46.62,"https://www.ifsp.edu.br"],ifmg:["IFMG","Belo Horizonte, MG",-19.92,-43.94,"https://www.ifmg.edu.br"],ifpr:["IFPR","Curitiba, PR",-25.43,-49.27,"https://ifpr.edu.br"]};

/* 10 áreas (mesmos códigos usados na IA, no Worker) */
var P={
saude:{n:"Profissional da Saúde e Bem-estar",d:"Seu perfil mostra vontade de cuidar de pessoas e lidar com responsabilidade. A área reúne medicina, enfermagem, farmácia, fisioterapia, psicologia, nutrição, odontologia e biomedicina.",c:[["Medicina","Bacharelado · 6 anos"],["Enfermagem","Bacharelado · 5 anos"],["Psicologia","Bacharelado · 5 anos"],["Nutrição","Bacharelado · 4 anos"]],u:["usp","unicamp","ufmg","ufrj","ufba","ufc","ufam","ufrgs"]},
tec:{n:"Profissional de Tecnologia e Dados",d:"Você gosta de lógica, resolver problemas e construir coisas que funcionam. A área inclui software, ciência de dados, IA, cibersegurança, nuvem, suporte técnico e UX/UI.",c:[["Ciência da Computação","Bacharelado · 4 anos"],["Sistemas de Informação","Bacharelado · 4 anos"],["Análise e Desenvolvimento de Sistemas","Tecnólogo · 2 a 3 anos"],["Segurança da Informação","Tecnólogo · 2 anos"]],u:["usp","unicamp","ufscar","ufmg","ufpe","ufrj","ufrgs","ufc","unb"]},
eng:{n:"Engenheiro(a) / Profissional da Indústria",d:"Você quer entender como as coisas funcionam e melhorar processos reais. Engenharia une exatas e prática: civil, mecânica, elétrica, química, produção, automação e ambiental.",c:[["Engenharia Civil","Bacharelado · 5 anos"],["Engenharia de Produção","Bacharelado · 5 anos"],["Engenharia Elétrica","Bacharelado · 5 anos"],["Engenharia Química","Bacharelado · 5 anos"]],u:["usp","unicamp","ufscar","ufrj","ufmg","ufsc","ufpr","ufrgs","unb"]},
neg:{n:"Profissional de Negócios e Finanças",d:"Você tem visão de resultado e gosta de organizar, planejar e tomar decisões. A área envolve administração, contabilidade, bancos e investimentos, consultoria, RH e empreendedorismo.",c:[["Administração","Bacharelado · 4 anos"],["Ciências Contábeis","Bacharelado · 4 anos"],["Ciências Econômicas","Bacharelado · 4 anos"],["Gestão de Recursos Humanos","Tecnólogo · 2 anos"]],u:["usp","fgv","insper","ufrj","ufmg","ufrgs","unb","ufpe","ufc"]},
educ:{n:"Educador(a) / Pesquisador(a)",d:"Você gosta de explicar, orientar e ver os outros evoluírem. A área vai de professor e coordenação pedagógica a pesquisa acadêmica e educação a distância.",c:[["Pedagogia","Licenciatura · 4 anos"],["Letras","Licenciatura · 4 anos"],["Matemática","Licenciatura · 4 anos"],["História","Licenciatura · 4 anos"]],u:["usp","unicamp","bauru","ufscar","ufmg","ufrgs","ufba","ufc"]},
dir:{n:"Profissional do Direito e Setor Público",d:"Você valoriza argumentação, regras claras e justiça. A área inclui advocacia, magistratura, concursos públicos, diplomacia e segurança pública.",c:[["Direito","Bacharelado · 5 anos"],["Relações Internacionais","Bacharelado · 4 anos"],["Administração Pública","Bacharelado · 4 anos"],["Gestão em Segurança Pública","Tecnólogo · 2 anos"]],u:["usp","ufmg","ufrj","unb","ufrgs","ufpe","ufba","ufsc","ufpr"]},
com:{n:"Profissional de Comunicação, Marketing e Criação",d:"Você pensa de forma criativa e gosta de transformar ideias em mensagens e imagens. A área abrange publicidade, jornalismo, design, audiovisual, produção de conteúdo e social media.",c:[["Publicidade e Propaganda","Bacharelado · 4 anos"],["Jornalismo","Bacharelado · 4 anos"],["Design","Bacharelado · 4 anos"],["Cinema e Audiovisual","Bacharelado · 4 anos"]],u:["bauru","usp","unicamp","ufrj","ufpe","ufpr","ufsc","ufmg"]},
serv:{n:"Profissional de Comércio e Serviços",d:"Você gosta de lidar com público, negociar e entregar boas experiências. A área envolve vendas, varejo, logística, turismo, hotelaria e gastronomia.",c:[["Turismo","Bacharelado · 4 anos"],["Hotelaria","Tecnólogo · 2 anos"],["Gastronomia","Tecnólogo · 2 anos"],["Logística","Tecnólogo · 2 anos"]],u:["senac","ifsp","ifmg","ifpr","usp","ufc"]},
agro:{n:"Profissional do Agronegócio e Meio Ambiente",d:"Você se conecta com natureza, animais e produção sustentável. A área inclui agronomia, veterinária, zootecnia, sustentabilidade e energias renováveis.",c:[["Agronomia","Bacharelado · 5 anos"],["Medicina Veterinária","Bacharelado · 5 anos"],["Zootecnia","Bacharelado · 5 anos"],["Engenharia Ambiental","Bacharelado · 5 anos"]],u:["esalq","ufv","ufla","ufscar","ufrgs","ufpr","unb","ufc"]},
ofic:{n:"Profissional Técnico e de Ofícios",d:"Você aprende fazendo e gosta de ver o resultado concreto do seu trabalho. São profissões de alta demanda: eletricista, encanador, mecânico, soldador e outras ocupações técnicas.",c:[["Técnico em Eletrotécnica","Curso técnico · cerca de 2 anos"],["Técnico em Mecânica","Curso técnico · cerca de 2 anos"],["Soldador","Qualificação profissional · curta duração"],["Instalador Hidráulico","Qualificação profissional · curta duração"]],u:["senai","ifsp","ifmg","ifpr"]}
};

/* PERGUNTAS. Tipos: o = escolha única, m = até 3 opções, s = escala 1 a 5, t = dissertativa */
function L(a){return a.map(function(x){return typeof x=="string"?[x,[]]:x})}
function O(t,o){return{t:t,k:"o",o:L(o)}}
function M(t,o){return{t:t,k:"m",o:L(o)}}
function S(t,a,b){return{t:t,k:"s",l:[a,b]}}
function T(t){return{t:t,k:"t"}}

var QR=[
O("Qual atividade faria você perder a noção do tempo?",[["Resolver problemas de lógica e tecnologia",["tec","eng"]],["Ajudar alguém a se sentir melhor",["saude","educ"]],["Criar algo novo: textos, imagens ou vídeos",["com","tec"]],["Montar, consertar ou construir coisas com as mãos",["ofic","eng"]],["Organizar um negócio ou vender uma ideia",["neg","serv"]],["Cuidar da natureza, de plantas ou de animais",["agro","saude"]]]),
O("Em um trabalho em grupo, você costuma ser quem…",[["Organiza a parte técnica e faz funcionar",["tec","eng"]],["Lidera e define quem faz o quê",["neg","dir"]],["Cuida do clima e escuta todo mundo",["saude","educ"]],["Cuida da apresentação e da comunicação",["com","serv"]],["Argumenta e defende o ponto do grupo",["dir","neg"]],["Põe a mão na massa e executa",["ofic","agro"]]]),
O("Qual ambiente de trabalho combina mais com você?",[["Escritório moderno ou computador em casa",["tec","neg"]],["Hospital, clínica ou escola",["saude","educ"]],["Obra, fábrica ou oficina",["eng","ofic"]],["Campo, fazenda ou ao ar livre",["agro","ofic"]],["Loja, hotel, restaurante ou viagens",["serv","com"]],["Fórum, órgão público ou escritório de advocacia",["dir","neg"]]]),
O("Qual matéria sempre foi a sua preferida?",[["Matemática e Física",["eng","tec"]],["Biologia e Química",["saude","agro"]],["Redação e Artes",["com","educ"]],["História, Sociologia ou Filosofia",["dir","educ"]],["Geografia e Ciências",["agro","eng"]],["Economia e matemática do dia a dia",["neg","serv"]]]),
O("O que mais importa para você em uma carreira?",[["Inovar e trabalhar com tecnologia de ponta",["tec","com"]],["Impacto direto na vida das pessoas",["saude","educ"]],["Bom salário e crescimento rápido",["neg","tec"]],["Estabilidade e segurança",["dir","eng"]],["Liberdade para criar",["com","serv"]],["Começar logo em uma profissão prática",["ofic","serv"]]]),
O("Diante de um problema difícil, você…",[["Divide em partes e testa soluções",["tec","eng"]],["Tenta entender o que as pessoas envolvidas sentem",["saude","educ"]],["Imagina uma ideia diferente do que já existe",["com","neg"]],["Pesquisa regras e informações antes de decidir",["dir","neg"]],["Procura quem já resolveu e faz na prática",["ofic","serv"]]])
];

var QL=[
O("Quando surge um problema difícil, você prefere:",["Analisar todas as possibilidades antes de agir.","Testar uma solução rapidamente.","Pedir opiniões de outras pessoas.","Seguir um método que já conhece.","Criar uma solução diferente das convencionais."]),
S("De 1 a 5, quanto você gosta de resolver problemas que exigem raciocínio?","Não gosto","Gosto muito"),
O("Quando precisa aprender algo novo, você prefere:",["Assistir a uma explicação.","Ler e pesquisar.","Praticar fazendo.","Observar alguém fazendo primeiro.","Aprender sozinho, explorando."]),
T("Conte sobre uma situação em que você precisou resolver um problema sem saber exatamente como fazer. O que você fez?"),
O("Em um trabalho em grupo, você normalmente prefere:",["Liderar o grupo.","Organizar as tarefas.","Executar as tarefas.","Apresentar o trabalho.","Criar ideias.","Analisar e revisar o resultado."]),
S("De 1 a 5, quanto você gosta de trabalhar em equipe?","Não gosto","Gosto muito"),
O("Qual ambiente de trabalho combina mais com você?",[["Silencioso e organizado.",["tec","dir"]],["Dinâmico e movimentado.",["serv","com"]],["Criativo e informal.",["com","tec"]],["Competitivo e desafiador.",["neg","dir"]],["Colaborativo e social.",["educ","saude"]]]),
O("Se um colega discordasse completamente da sua ideia, o que você provavelmente faria?",["Defenderia minha ideia.","Tentaria entender o ponto de vista dele.","Procuraria uma solução que combinasse as duas ideias.","Mudaria minha ideia se ele apresentasse bons argumentos.","Deixaria a decisão para o grupo."]),
O("Qual dessas atividades mais desperta seu interesse?",[["Criar projetos.",["com","eng"]],["Trabalhar com tecnologia.",["tec"]],["Cuidar/ajudar pessoas.",["saude","educ"]],["Analisar dados e informações.",["tec","neg"]],["Administrar negócios.",["neg","serv"]],["Trabalhar com comunicação.",["com"]],["Trabalhar com atividades práticas.",["ofic","agro"]],["Pesquisar e descobrir coisas novas.",["saude","educ"]]]),
M("Escolha até 3 áreas que mais despertam seu interesse:",[["Tecnologia",["tec"]],["Saúde",["saude"]],["Engenharia",["eng"]],["Administração/Negócios",["neg"]],["Comunicação",["com"]],["Direito",["dir"]],["Educação",["educ"]],["Artes/Design",["com"]],["Ciências",["agro","saude"]],["Ciências Humanas",["educ","dir"]],["Serviços públicos",["dir","serv"]]]),
S("De 1 a 5, quanto você se considera uma pessoa criativa?","Nada criativa","Muito criativa"),
T("Se pudesse criar qualquer projeto para melhorar sua comunidade, o que você criaria e por quê?"),
O("O que você mais valoriza em uma profissão?",["Bom salário.","Estabilidade.","Liberdade.","Criatividade.","Reconhecimento.","Ajudar outras pessoas.","Possibilidade de crescimento.","Fazer algo que gosto."]),
O("Você prefere uma profissão que envolva:",["Rotina e estabilidade.","Mudanças constantes.","Uma mistura dos dois."]),
S("De 1 a 5, quanto você se sente confortável tomando decisões importantes?","Nada confortável","Muito confortável"),
T("Imagine que você recebeu duas propostas de emprego: uma oferece estabilidade e outra oferece maior possibilidade de crescimento, mas envolve mais riscos. Qual escolheria e por quê?"),
O("O que você considera mais importante para alcançar uma boa carreira?",["Inteligência.","Disciplina.","Criatividade.","Comunicação.","Conhecimento.","Experiência.","Capacidade de trabalhar em equipe.","Persistência."]),
S("De 1 a 5, quanto você se considera disposto a experimentar coisas novas?","Nada disposto","Muito disposto"),
O("Qual dessas situações mais combina com você?",["Prefiro planejar tudo antes de começar.","Planejo o essencial e vou adaptando.","Prefiro começar e descobrir durante o processo.","Gosto de improvisar e encontrar soluções no caminho."]),
T("Como você imagina sua vida profissional daqui a 10 anos? Descreva o tipo de trabalho, ambiente e objetivos que gostaria de ter.")
];
var G=["Perfil e raciocínio","Trabalho e personalidade","Interesses profissionais","Trabalho e decisões","Futuro e autoconhecimento"];

/* ACESSIBILIDADE E TEMA */
var fs=parseInt(ld("nm-fs")||"100");
function setFs(v){fs=Math.max(80,Math.min(160,v));R.style.fontSize=fs+"%";sv("nm-fs",fs)}
function setTh(t){R.setAttribute("data-theme",t);sv("nm-th",t);$("thB").textContent=t=="dark"?"☀️ Modo claro":"🌙 Modo escuro";D.querySelectorAll("[data-th]").forEach(function(b){b.setAttribute("aria-pressed",b.dataset.th==t)})}
function setCb(on){R.setAttribute("data-cb",on?"1":"0");sv("nm-cb",on?"1":"0");$("cb").setAttribute("aria-pressed",on)}
setFs(fs);
setTh(ld("nm-th")||(matchMedia("(prefers-color-scheme:dark)").matches?"dark":"light"));
setCb(ld("nm-cb")=="1");
$("fp").onclick=function(){setFs(fs+10)};$("fm").onclick=function(){setFs(fs-10)};$("fr").onclick=function(){setFs(100)};
$("cb").onclick=function(){setCb(R.getAttribute("data-cb")!="1")};
$("thB").onclick=function(){setTh(R.getAttribute("data-theme")=="dark"?"light":"dark")};
D.querySelectorAll("[data-th]").forEach(function(b){b.onclick=function(){setTh(b.dataset.th)}});
function ap(o){$("ap").classList.toggle("open",o);$("apB").setAttribute("aria-expanded",o);if(o)$("fp").focus()}
$("apB").onclick=function(){ap(!$("ap").classList.contains("open"))};$("apX").onclick=function(){ap(false);$("apB").focus()};
D.addEventListener("keydown",function(e){if(e.key=="Escape")ap(false)});

/* QUIZ */
var Q=QR,cur=0,ans=[];
function start(modo){
  if(modo=="rapido"){Q=QR}else{Q=QL}
  ans=[];cur=0;$("md").classList.add("hid");$("qc").classList.remove("hid");showQ();
}
function ok(i){var a=ans[i],k=Q[i].k;
  if(k=="m")return !!a&&a.length>0;
  if(k=="t")return !!a&&a.trim().length>=10;
  return a!==undefined}
function txt(i){var q=Q[i],a=ans[i];
  if(q.k=="o")return q.o[a][0];
  if(q.k=="m")return a.map(function(x){return q.o[x][0]}).join("; ");
  if(q.k=="s")return a+" de 5 ("+q.l[0]+" = 1, "+q.l[1]+" = 5)";
  return a.trim().slice(0,500)}
function showQ(){var q=Q[cur],a=ans[cur],box=$("qo");
  $("qn").textContent="Pergunta "+(cur+1)+" de "+Q.length+(Q.length>6?" · "+G[Math.floor(cur/4)]:"");
  $("pb").style.width=(cur/Q.length*100)+"%";$("qt").textContent=q.t;box.innerHTML="";
  if(q.k=="o"||q.k=="m"){
    if(q.k=="m"){var h=D.createElement("p");h.className="note";h.style.margin="0 0 .8rem";h.textContent="Escolha até 3 opções.";box.appendChild(h)}
    q.o.forEach(function(o,i){var b=D.createElement("button");
      b.className="opt";b.textContent=o[0];
      b.setAttribute("aria-pressed",q.k=="m"?(a||[]).indexOf(i)>-1:a===i);
      b.onclick=function(){
        if(q.k=="m"){var l=(ans[cur]||[]).slice(),p=l.indexOf(i);if(p>-1)l.splice(p,1);else if(l.length<3)l.push(i);else return;ans[cur]=l}
        else{ans[cur]=i}
        showQ()};
      box.appendChild(b)});
  }else if(q.k=="s"){
    var r=D.createElement("div");r.className="sc";
    for(var n=1;n<=5;n++)(function(n){var b=D.createElement("button");b.className="opt";b.textContent=n;b.setAttribute("aria-label",n+" de 5");b.setAttribute("aria-pressed",a===n);b.onclick=function(){ans[cur]=n;showQ()};r.appendChild(b)})(n);
    box.appendChild(r);
    var l=D.createElement("div");l.className="scl";l.innerHTML="<span></span><span></span>";
    l.children[0].textContent="1 = "+q.l[0];l.children[1].textContent="5 = "+q.l[1];box.appendChild(l);
  }else{
    var t=D.createElement("textarea");t.maxLength=500;t.value=a||"";t.setAttribute("aria-label","Sua resposta");
    t.placeholder="Escreva com suas palavras (mínimo de 10 caracteres)";
    t.oninput=function(){ans[cur]=t.value;$("nx").disabled=!ok(cur)};box.appendChild(t);
  }
  $("nx").disabled=!ok(cur);$("nx").textContent=cur==Q.length-1?"Ver resultado":"Próxima"}
$("bk").onclick=function(){if(cur>0){cur--;showQ()}else{$("qc").classList.add("hid");$("md").classList.remove("hid")}};
$("nx").onclick=function(){if(cur<Q.length-1){cur++;showQ()}else finish()};
$("m6").onclick=function(){start("rapido")};
$("m20").onclick=function(){start("completo")};
$("go").onclick=function(){$("teste").scrollIntoView();askLoc(true)};
function finish(){$("qc").classList.add("hid");$("th").classList.remove("hid");$("pb").style.width="100%";
  setTimeout(async function(){$("th").classList.add("hid");await result();$("rs").classList.remove("hid");$("rs").scrollIntoView()},1800)}

/* LOCALIZAÇÃO */
var me=null,topKey=null,sel=null;
var seen={};Object.keys(U).forEach(function(k){if(seen[U[k][1]])return;seen[U[k][1]]=1;var o=D.createElement("option");o.value=k;o.textContent=U[k][1];$("lc").appendChild(o)});
function setMe(la,lo,txt){me=[la,lo];$("ls").textContent="Localização: "+txt;if(topKey)drawUnis()}
function askLoc(quiet){if(!navigator.geolocation){if(!quiet)$("ls").textContent="Seu navegador não permite localização. Escolha uma cidade.";return}
  navigator.geolocation.getCurrentPosition(function(p){setMe(p.coords.latitude,p.coords.longitude,"detectada ✓")},function(){if(!quiet||topKey)$("ls").textContent="Não foi possível detectar. Escolha uma cidade ao lado."},{timeout:8000})}
$("lb").onclick=function(){askLoc(false)};
$("lc").onchange=function(){var k=this.value;if(k)setMe(U[k][2],U[k][3],"perto de "+U[k][1])};
function dist(a,b,c,d){var r=Math.PI/180,x=(c-a)*r,y=(d-b)*r,h=Math.sin(x/2)*Math.sin(x/2)+Math.cos(a*r)*Math.cos(c*r)*Math.sin(y/2)*Math.sin(y/2);return 12742*Math.asin(Math.sqrt(h))}

/* RESULTADO */
function score(){var s={},tot=0;Object.keys(P).forEach(function(k){s[k]=0});
  Q.forEach(function(q,i){if(q.k!="o"&&q.k!="m")return;
    (q.k=="m"?ans[i]:[ans[i]]).forEach(function(ix){q.o[ix][1].forEach(function(ar,j){var p=j?1:2;s[ar]+=p;tot+=p})})});
  return{s:s,tot:Math.max(tot,1)}}
async function result(){
  var fallback=function(){
    var sc=score(),pc=function(k){return Math.min(96,Math.round(45+130*sc.s[k]/sc.tot))};
    var ord=Object.keys(sc.s).sort(function(a,b){return sc.s[b]-sc.s[a]}),k=ord[0];topKey=k;
    $("rt").textContent=P[k].n;$("rp").textContent=pc(k)+"%";$("rd").textContent=P[k].d;$("rb").style.width=pc(k)+"%";
    $("rc").innerHTML=ord.slice(1,4).map(function(o){return '<span class="chip">'+P[o].n+" · "+pc(o)+"%</span>"}).join("");
    $("cr").innerHTML=P[k].c.map(function(c){return "<li><b>"+c[0]+"</b><small>"+c[1]+"</small></li>"}).join("");
    drawUnis();
  };

  try{
    var respostas=Q.map(function(q,i){return {p:q.t,r:txt(i)}});
    var resp=await fetch("api/grok.php",{
      method:"POST",
      headers:{"Content-Type":"application/json"},
      credentials:"same-origin",
      body:JSON.stringify({respostas:respostas})
    });
    var data=await resp.json();
    if(!resp.ok || !data.area || !P[data.area]) throw new Error(data.erro||"Falha na IA");

    topKey=data.area;
    var pct=Math.max(0,Math.min(100,Number(data.pct)||0));
    $("rt").textContent=P[data.area].n;
    $("rp").textContent=pct+"%";
    $("rd").textContent=data.resumo || P[data.area].d;
    $("rb").style.width=pct+"%";

    var outras=Array.isArray(data.outras)?data.outras.filter(function(x){return x&&P[x.area]&&x.area!==data.area}).slice(0,3):[];
    $("rc").innerHTML=outras.map(function(x){
      return '<span class="chip">'+P[x.area].n+" · "+Math.max(0,Math.min(100,Number(x.pct)||0))+"%</span>";
    }).join("");

    $("cr").innerHTML=P[data.area].c.map(function(c){
      return "<li><b>"+c[0]+"</b><small>"+c[1]+"</small></li>";
    }).join("");
    drawUnis();
  }catch(e){
    console.error(e);
    fallback();
  }
}
var OUT=[[-60.2,5.2],[-51.6,4.2],[-50,1.8],[-50.7,0],[-48.5,-1.5],[-44.5,-2.5],[-39.5,-3],[-35.2,-5.2],[-34.9,-8],[-37.2,-11.5],[-39,-14.5],[-39.2,-18.5],[-40.9,-21.8],[-42,-23],[-44.5,-23.3],[-48,-25.5],[-48.8,-28.5],[-50.5,-31],[-53.4,-33.7],[-53.5,-32.5],[-57.6,-30.2],[-56,-28.2],[-53.7,-26.6],[-54.6,-25.5],[-54.2,-24],[-55.5,-22],[-58.2,-20],[-58,-17.5],[-60,-16.2],[-60.2,-13.5],[-65,-10],[-69.5,-10.9],[-73,-9],[-72.8,-7.5],[-70,-4.2],[-69.5,-1],[-69.8,1.5],[-67,2],[-64,4.2]];
function px(la,lo){return[((lo+74)*9.8).toFixed(1),((6-la)*9.8).toFixed(1)]}
function drawUnis(){var list=P[topKey].u.map(function(id){var u=U[id];return{id:id,u:u,d:me?dist(me[0],me[1],u[2],u[3]):null}});
  if(me)list.sort(function(a,b){return a.d-b.d});
  $("ln").textContent=me?"(da mais próxima para a mais distante)":"(permita a localização para ordenar por distância)";
  var svg='<polygon class="br" points="'+OUT.map(function(p){return px(p[1],p[0]).join(",")}).join(" ")+'"/>';
  list.forEach(function(x,i){var p=px(x.u[2],x.u[3]);svg+='<g><circle class="pt'+(sel==x.id?" on":"")+'" data-id="'+x.id+'" cx="'+p[0]+'" cy="'+p[1]+'" r="10" tabindex="0" role="button" aria-label="'+x.u[0]+', '+x.u[1]+'"/><text x="'+p[0]+'" y="'+(+p[1]+4)+'">'+(i+1)+"</text></g>"});
  if(me){var m=px(me[0],me[1]);svg+='<circle class="me" cx="'+m[0]+'" cy="'+m[1]+'" r="7"><title>Você</title></circle><text style="fill:var(--tx)" x="'+m[0]+'" y="'+(+m[1]-11)+'">Você</text>'}
  $("map").innerHTML=svg;
  $("ul").innerHTML=list.map(function(x,i){return '<div class="uni'+(sel==x.id?" on":"")+'" data-id="'+x.id+'"><span class="n">'+(i+1)+'</span><div><b>'+x.u[0]+"</b><small>"+x.u[1]+(x.d!=null?" · cerca de "+Math.round(x.d).toLocaleString("pt-BR")+" km":"")+'</small><a href="'+x.u[4]+'" target="_blank" rel="noopener">Site oficial ↗</a> · <a href="https://www.google.com/maps/search/?api=1&query='+encodeURIComponent(x.u[0]+" "+x.u[1])+'" target="_blank" rel="noopener">Ver no Google Maps ↗</a></div></div>'}).join("");
  D.querySelectorAll("[data-id]").forEach(function(e){var f=function(){sel=e.dataset.id;drawUnis()};e.onclick=f;e.onkeydown=function(ev){if(ev.key=="Enter"||ev.key==" "){ev.preventDefault();f()}}})}
$("rt2").onclick=function(){ans=[];cur=0;sel=null;$("rs").classList.add("hid");$("qc").classList.add("hid");$("md").classList.remove("hid");$("teste").scrollIntoView()};
</script>
</body>
</html>
