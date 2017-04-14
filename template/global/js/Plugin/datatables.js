(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/Plugin/datatables', ['exports', 'jquery', 'Plugin'], factory);
  } else if (typeof exports !== "undefined") {
    factory(exports, require('jquery'), require('Plugin'));
  } else {
    var mod = {
      exports: {}
    };
    factory(mod.exports, global.jQuery, global.Plugin);
    global.PluginDatatables = mod.exports;
  }
})(this, function (exports, _jquery, _Plugin2) {
  'use strict';

  Object.defineProperty(exports, "__esModule", {
    value: true
  });

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  var _Plugin3 = babelHelpers.interopRequireDefault(_Plugin2);

  var NAME = 'dataTable';

  var DataTable = function (_Plugin) {
    babelHelpers.inherits(DataTable, _Plugin);

    function DataTable() {
      babelHelpers.classCallCheck(this, DataTable);
      return babelHelpers.possibleConstructorReturn(this, (DataTable.__proto__ || Object.getPrototypeOf(DataTable)).apply(this, arguments));
    }

    babelHelpers.createClass(DataTable, [{
      key: 'getName',
      value: function getName() {
        return NAME;
      }
    }, {
      key: 'render',
      value: function render() {
        if (!_jquery2.default.fn.dataTable) {
          return;
        }

        if (_jquery2.default.fn.dataTable.TableTools) {
          // Set the classes that TableTools uses to something suitable for Bootstrap
          _jquery2.default.extend(true, _jquery2.default.fn.dataTable.TableTools.classes, {
            container: 'DTTT btn-group btn-group pull-xs-left',
            buttons: {
              normal: 'btn btn-outline btn-default',
              disabled: 'disabled'
            },
            print: {
              body: 'site-print DTTT_Print'
            }
          });
        }

        this.$el.dataTable(this.options);
      }
    }], [{
      key: 'getDefaults',
      value: function getDefaults() {
        var dom = "<'row'<'col-sm-3'l><'col-sm-6'f><'col-sm-3 pull-xs-right'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>";
        return {
          responsive: true,
          language: {
            sSearchPlaceholder: 'Nhập từ khóa tìm kiếm..',
            lengthMenu: '_MENU_',
            search: '_INPUT_',
            paginate: {
              previous: '<i class="icon wb-chevron-left-mini"></i>',
              next: '<i class="icon wb-chevron-right-mini"></i>'
            },
            info: "Hiển thị từ _START_ tới _END_ của _TOTAL_ bản ghi",
            lengthMenu:     "Hiển thị _MENU_ bản ghi",              
          },

          dom: dom, //'lrtipB', //'Bfrtip',
          buttons: [
              {
                  extend:    'excelHtml5',
                  text:      '<i class="fa fa-file-excel-o"></i> Xuất Excel',
                  className: 'btn btn-info waves-effect waves-light m-r-5',
                  titleAttr: 'Excel'
              },
              // {
              //     extend:    'csvHtml5',
              //     text:      '<i class="fa fa-file-text-o"></i> CSV',
              //     className: 'btn btn-info waves-effect waves-light m-r-5',
              //     titleAttr: 'CSV'
              // },
              {
                  extend:    'pdfHtml5',
                  text:      '<i class="fa fa-file-pdf-o"></i> Xuất PDF',
                  className: 'btn btn-info waves-effect waves-light m-r-5',
                  titleAttr: 'PDF',
              }
          ]
                             
        };
      }
    }]);
    return DataTable;
  }(_Plugin3.default);

  _Plugin3.default.register(NAME, DataTable);

  exports.default = DataTable;
});
