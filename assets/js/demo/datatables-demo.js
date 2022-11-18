// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    language: {
      search:         "Pesquisar:",
      lengthMenu:    "Exibir _MENU_ elementos",
      zeroRecords:    "<h1>Não há dados para serem exibidos</h1>",
      info:           "Exibindo de _START_ a _END_ de _TOTAL_ elementos",
      paginate: {
          first:      "Primeira",
          previous:   "Anterior",
          next:       "Próxima",
          last:       "Última"
      },
  }
  }); 
});
