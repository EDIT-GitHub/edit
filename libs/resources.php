<?php

/**
 * Resources.
 *
 * Translations for the website
 *
 * @version 1.0
 * @author nuno.ildefonso
 */

#region Translations

/**
 * Gets the translation for the passed key
 *
 * @uses get_the_user_ip, wpdb
 *
 * @since 1.0
 *
 * @return array The logged User data.
 */

function dictionaryString($key){

    $current = LANGUAGE;

    $ptDictionary = array();
    $esDictionary = array();

    $ptDictionary["Onde_estou"] = "Onde estou?";
    $esDictionary["Onde_estou"] = "¿Dónde estoy?";

    $ptDictionary["Sucesso"] = "Sucesso";
    $esDictionary["Sucesso"] = "Éxito";

    $ptDictionary["noticia"] = "Notícia";
    $esDictionary["noticia"] = "Noticia";

    $ptDictionary["Subscrever"] = "recebe as novidades";
    $esDictionary["Subscrever"] = "recibe las novedades";

    $ptDictionary["Mais_info"] = "Mais info";
    $esDictionary["Mais_info"] = "Más info";

    $ptDictionary["QUERO_PARTILHAR_ESTA_PAGINA"] = "QUERO PARTILHAR ESTA PÁGINA";
    $esDictionary["QUERO_PARTILHAR_ESTA_PAGINA"] = "QUIERO COMPARTIR ESTA PÁGINA";

    $ptDictionary["Janeiro"] = "Janeiro";
    $esDictionary["Janeiro"] = "Enero";

    $ptDictionary["Fevereiro"] = "Fevereiro";
    $esDictionary["Fevereiro"] = "Febrero";

    $ptDictionary["Março"] = "Março";
    $esDictionary["Março"] = "Marzo";

    $ptDictionary["Abril"] = "Abril";
    $esDictionary["Abril"] = "Abril";

    $ptDictionary["Maio"] = "Maio";
    $esDictionary["Maio"] = "Mayo";

    $ptDictionary["Junho"] = "Junho";
    $esDictionary["Junho"] = "Junio";

    $ptDictionary["Julho"] = "Julho";
    $esDictionary["Julho"] = "Julio";

    $ptDictionary["Agosto"] = "Agosto";
    $esDictionary["Agosto"] = "Agosto";

    $ptDictionary["Setembro"] = "Setembro";
    $esDictionary["Setembro"] = "Septiembre";

    $ptDictionary["Outubro"] = "Outubro";
    $esDictionary["Outubro"] = "Octubre";

    $ptDictionary["Novembro"] = "Novembro";
    $esDictionary["Novembro"] = "Noviembre";

    $ptDictionary["Dezembro"] = "Dezembro";
    $esDictionary["Dezembro"] = "Diciembre";

    $ptDictionary["Localizacao"] = "Localizacao";
    $esDictionary["Localizacao"] = "Localización";

    $ptDictionary["o_que_procuras"] = "O que procuras?";
    $esDictionary["o_que_procuras"] = "¿Qué estás buscando?";

    $ptDictionary["emprego"] = "Emprego";
    $esDictionary["emprego"] = "Empleo";

    $ptDictionary["estagio"] = "Estágio";
    $esDictionary["estagio"] = "Prácticas";

    $ptDictionary["Nao_foram_encontrados"] = "Não foram encontrados resultados para a sua pesquisa.";
    $esDictionary["Nao_foram_encontrados"] = "No se han encontrado resultados en tu búsqueda.";

    $ptDictionary["Nao_foram_encontrados_anuncios"] = "Não foram encontrados Anúncios!";
    $esDictionary["Nao_foram_encontrados_anuncios"] = "No se han encontrado Anúncios!";

    $ptDictionary["Nao_foram_encontrados_eventos"] = "Não foram encontradas eventos!";
    $esDictionary["Nao_foram_encontrados_eventos"] = "No se han encontrado eventos!";

    $ptDictionary["Nao_foram_encontrados_blog"] = "Não foram encontradas blog!";
    $esDictionary["Nao_foram_encontrados_blog"] = "No se han encontrado blog!";

    $ptDictionary["Nao_foram_encontrados_entrevistas"] = "Não foram encontradas entrevistas!";
    $esDictionary["Nao_foram_encontrados_entrevistas"] = "No se han encontrado entrevistas!";

    $ptDictionary["Nao_foram_encontrados_resultados"] = "Não foram encontradas resultados!";
    $esDictionary["Nao_foram_encontrados_resultados"] = "¡No se han encontrado resultados!";

    $ptDictionary["Nao_foram_encontrados_ofertas"] = "Não foram encontradas ofertas!";
    $esDictionary["Nao_foram_encontrados_ofertas"] = "¡No se han encontrado ofertas!";

    $ptDictionary["Nao_foram_encontrados_Noticias"] = "Não foram encontradas Noticias!";
    $esDictionary["Nao_foram_encontrados_Noticias"] = "¡No se han encontrado noticias!";

    $ptDictionary["Ano"] = "Ano";
    $esDictionary["Ano"] = "Año";

    $ptDictionary["Procurou"] = "Procurou";
    $esDictionary["Procurou"] = "Buscaste";

    $ptDictionary["Pesquisa"] = "Pesquisa";
    $esDictionary["Pesquisa"] = "Búsqueda";

    $ptDictionary["Alunos"] = "Alunos";
    $esDictionary["Alunos"] = "Alumnos";

    $ptDictionary["Limpar"] = "Limpar";
    $esDictionary["Limpar"] = "Limpiar";

    $ptDictionary["ver_todos_os_resultados"] = "ver todos os resultados";
    $esDictionary["ver_todos_os_resultados"] = "Ver todos los resultados";

    $ptDictionary["Alunos_Internacionais"] = "Alunos Internacionais";
    $esDictionary["Alunos_Internacionais"] = "Alumnos internacionales";

    $ptDictionary["subtitulo_profissoes"] = "Entende melhor as saídas profissionais da EDIT., como funciona o mercado, quais as empresas que atuam na área e como escolher o melhor caminho para começar a tua carreira.";
    $esDictionary["subtitulo_profissoes"] = "Entiende mejor las salidas profesionales de EDIT., cómo funciona el mercado, cuáles son las empresas que trabajan en el área y cómo elegir el mejor camino para comenzar tu carrera.";

    $ptDictionary["O_contacto_com_as_marcas"] = "O contacto com as marcas / clientes é essencial no método de ensino da EDIT. No âmbito do projeto final dos​ ​​​programas, os alunos desenvolvem campanhas digitais multi-plataformas para marcas a atuar no mercado, com a supervisão dos tutores e de profissionais das agências parceiras.​ ​Aqui podes ver alguns dos trabalhos realizados pelos alunos.";
    $esDictionary["O_contacto_com_as_marcas"] = "Para el proyecto final de los Masters, los alumnos desarrollan campañas digitales integradas y de multiplataforma para marcas reconocidas a nivel internacional, validando el proceso de aprendizaje en el sector digital. Estos proyectos son supervisados por tutores de EDIT. y profesionales de nuestras agencias partners.";

    $ptDictionary["Data_a_definir"] = "Data a definir";
    $esDictionary["Data_a_definir"] = "Por definir";

    $ptDictionary["quero_participar_neste_evento"] = "quero participar neste evento";
    $esDictionary["quero_participar_neste_evento"] = "Quiero participar en este evento";

    $ptDictionary["Sessao_a_frequentar"] = "Sessão a frequentar";
    $esDictionary["Sessao_a_frequentar"] = "Asistir a sesión";

    $ptDictionary["Sessao_da_Manha"] = "Sessão da Manhã";
    $esDictionary["Sessao_da_Manha"] = "Sesión de la mañana";

    $ptDictionary["Sessao_da_Tarde"] = "Sessão da Tarde";
    $esDictionary["Sessao_da_Tarde"] = "Sesión de la mañana";

    $ptDictionary["Desejo_receber_a_newsletter"] = "Desejo receber a newsletter";
    $esDictionary["Desejo_receber_a_newsletter"] = "Deseo recibir la newsletter";

    $ptDictionary["Inscricao"] = "Inscrição";
    $esDictionary["Inscricao"] = "Inscripción";

    $ptDictionary["Quero_candidatar-me_a_esta_vaga"] = "Quero candidatar-me a esta vaga";
    $esDictionary["Quero_candidatar-me_a_esta_vaga"] = "Quiero postularme a esta oferta";

    $ptDictionary["Selecione"] = "Selecione";
    $esDictionary["Selecione"] = "Selecciona";

    $ptDictionary["telefone"] = "telefone";
    $esDictionary["telefone"] = "Teléfono";

    $ptDictionary["Tamanho_maximo"] = "Tamanho máximo:3mb - Formatos Permitidos:png,jpeg,gif,docx,pdf";
    $esDictionary["Tamanho_maximo"] = "Tamaño máximo: 3MB - Formatos permitidos: png, jpeg, gif, docx, pdf";

    $ptDictionary["Interesses"] = "Interesses";
    $esDictionary["Interesses"] = "Intereses";

    $ptDictionary["Candidatar-me"] = "Candidatar-me";
    $esDictionary["Candidatar-me"] = "Postularme";

    $ptDictionary["RECRUTAMENTO"] = "RECRUTAMENTO";
    $esDictionary["RECRUTAMENTO"] = "BÚSQUEDA DE TALENTO";

    $ptDictionary["Assunto"] = "Assunto";
    $esDictionary["Assunto"] = "Asunto";

    $ptDictionary["Pedido_de_Informacao"] = "Pedido de Informação";
    $esDictionary["Pedido_de_Informacao"] = "Pedido de información";

    $ptDictionary["Estadia_e_Estudar_em_Portugal"] = "Estadia e Estudar em Portugal";
    $esDictionary["Estadia_e_Estudar_em_Portugal"] = "Estadías y estudiar en Portugal";

    $ptDictionary["Cursos_Formação_EDIT"] = "Cursos/Formação EDIT.";
    $esDictionary["Cursos_Formação_EDIT"] = "Cursos / Formación EDIT.";

    $ptDictionary["Fechar"] = "Fechar";
    $esDictionary["Fechar"] = "Cerrar";

    $ptDictionary["Conteudo_Programatico"] = "Conteúdo Programático";
    $esDictionary["Conteudo_Programatico"] = "Programa";

    $ptDictionary["Modulo"] = "Módulo";
    $esDictionary["Modulo"] = "Módulo";

    $ptDictionary["Mensagem"] = "Mensagem";
    $esDictionary["Mensagem"] = "Mensaje";

    $ptDictionary["horario"] = "horário";
    $esDictionary["horario"] = "horario";

    $ptDictionary["Todas_as_ofertas_sao_disponibilizadas_pela_Tronik"] = "Todas as ofertas são disponibilizadas pela Tronik - Digital Recruitment Agency, especialista e profunda conhecedora do mercado digital nacional e internacional, e pela Landing.Jobs, startup de recrutamento tecnológico que atua no mercado internacional e  parceira da EDIT.";
    $esDictionary["Todas_as_ofertas_sao_disponibilizadas_pela_Tronik"] = "Todas las ofertas están disponibles en Tronik - Digital Recluitment Agency, especializada en el mercado digital a nivel nacional e internacional, y en Landing.Jobs, startup de búsqueda de talento en el área tecnológica a nivel internacional.";

    $ptDictionary["NOME"] = "NOME";
    $esDictionary["NOME"] = "NOMBRE";

    $ptDictionary["PHONE_PLUS"] = "+351 000 000 000";
    $esDictionary["PHONE_PLUS"] = "TELÉFONO";

    $ptDictionary["CIDADE"] = "CIDADE";
    $esDictionary["CIDADE"] = "CIUDAD";

    $ptDictionary["NOSSAS_NOVIDADES"] = "MANTÉM-TE A PAR DAS NOSSAS <span>NOVIDADES</span>";
    $esDictionary["NOSSAS_NOVIDADES"] = "MANTENTE AL DÍA DE LAS <span>NOVEDADES!</span>";

    $ptDictionary["APELIDO"] = "APELIDO";
    $esDictionary["APELIDO"] = "APELLIDO";

    $ptDictionary["Localizacao"] = "Localização";
    $esDictionary["Localizacao"] = "Localización";

    $ptDictionary["Areas_de_interesse"] = "Áreas de interesse";
    $esDictionary["Areas_de_interesse"] = "Áreas de interés";

    $ptDictionary["Pedido_enviado_com_sucesso"] = "Pedido enviado <br />com sucesso";
    $esDictionary["Pedido_enviado_com_sucesso"] = "¡Te has registrado <br />con éxito!";

    $ptDictionary["Adicionar_CV"] = "Adicionar CV";
    $esDictionary["Adicionar_CV"] = "Adjuntar CV";

    $ptDictionary["Resumo"] = "Resumo";
    $esDictionary["Resumo"] = "Presentación";

    $ptDictionary["Localizacao"] = "Localização";
    $esDictionary["Localizacao"] = "Localización";

    $ptDictionary["Funcao"] = "Função";
    $esDictionary["Funcao"] = "Puesto";

    $ptDictionary["Data"] = "Data";
    $esDictionary["Data"] = "Fecha";

    $ptDictionary["Referencia"] = "Referência ";
    $esDictionary["Referencia"] = "Referencia";

    $ptDictionary["Regime"] = "Regime ";
    $esDictionary["Regime"] = "Régimen";

    $ptDictionary["Artigos_relacionados"] = "ARTIGOS<BR/>RELACIONADOS";
    $esDictionary["Artigos_relacionados"] = "TEMAS<BR/>RELACIONADOS";

    $ptDictionary["Email_ja_registrado"] = "Email já registado.";
    $esDictionary["Email_ja_registrado"] = "Email ya registrado.";

    $ptDictionary["botao_formacao"] = "Ver toda a formação";
    $esDictionary["botao_formacao"] = "Ver toda la formación";

    $ptDictionary["botao_ofertas"] = "Ver todas as ofertas";
    $esDictionary["botao_ofertas"] = "Ver todos los empleos";

    $ptDictionary["button_saber_mais"] = "Saber mais";
    $esDictionary["button_saber_mais"] = "Saber más";

    $ptDictionary["button_ver_mais"] = "Ver mais";
    $esDictionary["button_ver_mais"] = "Ver más";

    $ptDictionary["formacao"] = "Formação";
    $esDictionary["formacao"] = "Formación";

    $ptDictionary["gdpr_label_text"] = "Este site utiliza cookies. Ao submeter este formulário estará a consentir a sua utilização.";
    $esDictionary["gdpr_label_text"] = "Este sitio utiliza cookies. Al someter este formulario estará consentido su uso.";

    $ptDictionary["gdpr_label_href"] = "Política de Privacidade";
    $esDictionary["gdpr_label_href"] = "Política de Privacidad";

    $ptDictionary["gdpr_href"] = "/politica-de-privacidade";
    $esDictionary["gdpr_href"] = "/politica-de-privacidad";

    $ptDictionary["profissoes"] = "Profissões";
    $esDictionary["profissoes"] = "Profesiones";

    $translate =  ($current == "PT")? $ptDictionary[$key]:$esDictionary[$key];

    return $translate;
}

function dictionary($key){

    echo dictionaryString($key);
}