<html>

<head>
<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

</head>
<body>
<script language="JavaScript">
function Sorter(config) {
    var requiredArgs = ['table', 'currentType', 'currentOrder', 'sortConfig'];
    for (var i = 0, k = requiredArgs[i]; k; k = requiredArgs[++i]) {
        this[k] = config[k];
    }

    var funcSortMap = {
        'desc': function(a,b) {
            return a.key - b.key;
        },
        'asc': function(a,b) {
            return b.key - a.key;
        }
    }

    this.sortBy = function(t) {
        if (this.currentType == t) {
            this.currentOrder = (this.currentOrder == 'asc'
                ? 'desc'
                : 'asc'
            );
        }
        else {
            this.currentType = t;
        }

        var keyCellIndex = this.sortConfig[this.currentType].columnIndex;
        var funcSort = (this.sortConfig[this.currentType].funcSortMap
            ? this.sortConfig[this.currentType].funcSortMap
            : funcSortMap
        )[this.currentOrder];
        doSort.apply(this, [keyCellIndex, funcSort]);
    }

    var tbody;
    function getTbody() {
        if ( !tbody ) {
            //pass by id or DOM node?
            tbody = (typeof this.table == 'string'      //pass by id
                ? document.getElementById(this.table)
                : this.table    //pass by DOM node
            );
        }
        return tbody;
    }

    function getRows() {
        var tbody = getTbody.call(this);
        var rows = tbody.getElementsByTagName('tr');
        return rows;
    }

    function doSort(keyCellIndex, sortFunc) {
        var rows = getRows.call(this);
        var keys = [];
        for (var i = 0, cell, row = rows[0]; row; row = rows[++i]) {
            cell = row.getElementsByTagName('td')[keyCellIndex].firstChild.nodeValue;
            keys[i] = {
                'key': cell,
                'row': row
            }
        }
        keys.sort(sortFunc);

        var tbody = getTbody.call(this);
        for (var i = 0, r = keys[i]; r; r = keys[++i]) {
            tbody.appendChild(r.row);
        }
    }
}

var sorter = {
    "currentType" :     "item",
    "currentOrder" :    "asc",
    "sortConfig" : {
        "item": {
            "columnIndex" : 0
        },
        "ean": {
            "columnIndex" : 1
        },
        "pname": {
            "columnIndex" : 2
        },
        "qty": {
            "columnIndex" : 3
        },
        "amt": {
            "columnIndex" : 4
        }
    },
    "sortBy" : function(t) {
        if (this.currentType == t) {
            this.currentOrder = (this.currentOrder == "asc"
                ? "desc"
                : "asc"
            );
        }
        else {
            this.currentType = t;
        }

        var keyCellIndex = this.sortConfig[this.currentType].columnIndex;
        var funcSort = this["funcSort_" + this.currentOrder];
        this.doSort(keyCellIndex, funcSort);
    },
    "funcSort_desc" : function(a,b) {
        return a.key - b.key;
    },
    "funcSort_asc" : function(a,b) {
        return b.key - a.key;
    },
    "getRows" : function() {
        var tbody = this.getTbody();
        var rows = tbody.getElementsByTagName('tr');
        return rows;
    },
    "getTbody" : function() {
        return document.getElementsByTagName('table')[0].getElementsByTagName('tbody')[0];
    },
    "doSort" : function(keyCellIndex, sortFunc) {
        var rows = this.getRows();
        var keys = [];
        for (var i = 0, cell, row = rows[0]; row; row = rows[++i]) {
            cell = row.getElementsByTagName('td')[keyCellIndex].firstChild.nodeValue;
            keys[i] = {
                "key": cell,
                "row": row
            }
        }
        keys.sort(sortFunc);

        var tbody = this.getTbody();
        for (var i = 0, r = keys[i]; r; r = keys[++i]) {
            tbody.appendChild(r.row);
        }
    }
}


function doSort(keyCellIndex, sortFunc) {
    var rows = getRows.call(this);
    var keys = [];
    for (var i = 0, cell, row = rows[0]; row; row = rows[++i]) {
        cell = row.getElementsByTagName('td')[keyCellIndex].firstChild.nodeValue;
        keys[i] = {
            'key': cell,
            'row': row
        }
    }
    keys.sort(sortFunc);

    var tbody = getTbody.call(this);
    for (var i = 0, fr, r = keys[i]; r; r = keys[++i]) {
        tbody.appendChild(r.row);
    }

    var newTbody = document.createElement('tbody');
    for (var i = 0, newRow, r = keys[i]; r; r = keys[++i]) {
        newRow = r.row.cloneNode(true);
        newTbody.appendChild(newRow);
    }
    var tbody = getTbody.call(this);
    tbody.parentNode.replaceChild(newTbody, tbody);
}

</script>



<table border="1" cellspacing="0">
<thead>
  <tr>
    <td class="item"><a href="javascript:sorter.sortBy('item');" class="ajs">項次</a></td>
    <td class="ean"><a href="javascript:sorter.sortBy('ean');" class="ajs">條碼</a></td>
    <td class="pname"><a href="javascript:sorter.sortBy('pname');" class="ajs">商品名稱</a></td>
    <td class="qty"><a href="javascript:sorter.sortBy('qty');" class="ajs">銷售量</a></td>
    <td class="amt"><a href="javascript:sorter.sortBy('amt');" class="ajs">銷售額</a></td>
  </tr>
</thead>
<tbody id="reportTbody">
  
  
  
  
  
  
  
  
  
  
<tr>
    <td>10</td>
    <td>4203876</td>
    <td>魚油</td>
    <td>11</td>
    <td>990</td>
  </tr><tr>
    <td>9</td>
    <td>4203868</td>
    <td>柚兒茶素</td>
    <td>3</td>
    <td>210</td>
  </tr><tr>
    <td>8</td>
    <td>4203866</td>
    <td>甲殼素膠囊</td>
    <td>3</td>
    <td>450</td>
  </tr><tr>
    <td>7</td>
    <td>4203865</td>
    <td>異黃酮</td>
    <td>8</td>
    <td>1640</td>
  </tr><tr>
    <td>6</td>
    <td>4203818</td>
    <td>綜合維他命</td>
    <td>12</td>
    <td>6000</td>
  </tr><tr>
    <td>5</td>
    <td>4203817</td>
    <td>葉黃素膠囊</td>
    <td>9</td>
    <td>891</td>
  </tr><tr>
    <td>4</td>
    <td>4203812</td>
    <td>膠原葡萄籽錠</td>
    <td>4</td>
    <td>1200</td>
  </tr><tr>
    <td>3</td>
    <td>4203811</td>
    <td>玻尿酸膠囊</td>
    <td>5</td>
    <td>2500</td>
  </tr><tr>
    <td>2</td>
    <td>4203810</td>
    <td>骨錠</td>
    <td>10</td>
    <td>2800</td>
  </tr><tr>
    <td>1</td>
    <td>4203803</td>
    <td>輕鬆錠</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr></tbody>
<tbody>
  <tr>
    <td>合計</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</tbody>
</table>



</body>
</html>