CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_usuario VARCHAR(100) NULL,
  end_usuario VARCHAR(100) NULL,
  email_usuario VARCHAR(100) NULL,
  fone_usuario VARCHAR(20) NULL,
  data_nasc_usuario DATE NULL,
  genero_usuario VARCHAR(20) NULL,
  PRIMARY KEY(id_usuario)
);

CREATE TABLE atendente (
  id_atendente INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  biblioteca_id_biblioteca INTEGER UNSIGNED NOT NULL,
  nome_atendente VARCHAR(100) NULL,
  PRIMARY KEY(id_atendente),
  INDEX atendente_FKIndex1(biblioteca_id_biblioteca)
);

CREATE TABLE biblioteca (
  id_biblioteca INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_biblioteca VARCHAR(100) NULL,
  end_biblioteca VARCHAR(100) NULL,
  PRIMARY KEY(id_biblioteca)
);

CREATE TABLE categoria (
  id_categoria INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_categoria VARCHAR(45) NULL,
  PRIMARY KEY(id_categoria)
);

CREATE TABLE livro (
  id_livro INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  categoria_id_categoria INTEGER UNSIGNED NOT NULL,
  titulo_livro VARCHAR(100) NULL,
  autor_livro VARCHAR(100) NULL,
  editora_livro VARCHAR(45) NULL,
  edicao_livro CHAR(3) NULL,
  ano_livro YEAR NULL,
  localidade_livro VARCHAR(20) NULL,
  PRIMARY KEY(id_livro),
  INDEX livro_FKIndex1(categoria_id_categoria)
);

CREATE TABLE reserva (
  aluno_id_aluno INTEGER UNSIGNED NOT NULL,
  livro_id_livro INTEGER UNSIGNED NOT NULL,
  atendente_id_atendente INTEGER UNSIGNED NOT NULL,
  data_emprestimo DATE NULL,
  data_devolucao DATE NULL,
  PRIMARY KEY(aluno_id_aluno, livro_id_livro),
  INDEX aluno_has_livro_FKIndex1(aluno_id_aluno),
  INDEX aluno_has_livro_FKIndex2(livro_id_livro),
  INDEX reserva_FKIndex3(atendente_id_atendente)
);
