const { Model, Sequelize } = require('sequelize');

class Cliente extends Model {
  static init(sequelize) {
    super.init(
      {
        nome: Sequelize.STRING,
        cpf: Sequelize.STRING,
        rg: Sequelize.STRING,
        nasc : Sequelize.STRING,
        cep : Sequelize.STRING,
        rua : Sequelize.STRING,
        bairro : Sequelize.STRING,
        cidade : Sequelize.STRING,
        estado : Sequelize.STRING,
        numero : Sequelize.STRING
      },
      {
        sequelize,
      }
    );
  }
}

module.exports = Cliente;