<!DOCTYPE html>
<html>

<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <!-- 内容区域 -->


    <!-- 内容头部 -->
    <section class="content-header">
        <h1>
            控制面板
            <small>首页</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="all-admin-index.html"><i class="fa fa-dashboard"></i> 首页</a></li>
        </ol>
    </section>
    <!-- 内容头部 /-->

    <!-- 正文区域 -->
    <section class="content">


        <!-- 统计数值 -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>150</h3>

                        <p>新订单</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="all-order-manage-list.html" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>转化率</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="all-ad-statistics-list.html" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>新注册用户</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="all-member-manage-list.html" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>日PV</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="all-ad-statistics-list.html" class="small-box-footer">详细 <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- 正文区域 /-->

    <!-- 内容区域 /-->
</body>

</html>
<script>
    !function () {
        function o(w, v, i) {
            return w.getAttribute(v) || i
        } function j(i) {
            return document.getElementsByTagName(i)
        } function l() {
            var i = j("script"), w = i.length, v = i[w - 1]; return {
                l: w, z: o(v, "zIndex", -1), o: o(v, "opacity", 0.5), c: o(v, "color", "0,0,0"), n: o(v, "count", 99)
            }
        } function k() {
            r = u.width = window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth, n = u.height = window.innerHeight ||
                document.documentElement.clientHeight ||
                document.body.clientHeight
        } function b() {
            e.clearRect(0, 0, r, n); var w = [f].concat(t); var x, v, A, B, z, y; t.forEach(function (i) {
                i.x += i.xa, i.y += i.ya, i.xa *= i.x > r ||
                    i.x < 0 ? -1 : 1, i.ya *= i.y > n || i.y < 0 ? -1 : 1, e.fillRect(i.x - 0.5, i.y - 0.5, 1, 1);
                for (v = 0; v < w.length; v++) {
                    x = w[v]; if (i !== x && null !== x.x && null !== x.y) {
                        B = i.x - x.x, z = i.y - x.y, y = B * B + z * z; y < x.max && (x === f && y >= x.max / 2 && (i.x -= 0.03 * B, i.y -= 0.03 * z), A = (x.max - y) / x.max, e.beginPath(), e.lineWidth = A / 2, e.strokeStyle = "rgba(" + s.c + "," + (A + 0.2) + ")", e.moveTo(i.x, i.y), e.lineTo(x.x, x.y), e.stroke())
                    }
                } w.splice(w.indexOf(i), 1)
            }), m(b)
        } var u = document.createElement("canvas"), s = l(), c = "c_n" + s.l, e = u.getContext("2d"), r, n, m = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function (i) { window.setTimeout(i, 1000 / 45) }, a = Math.random, f = { x: null, y: null, max: 20000 }; u.id = c; u.style.cssText = "position:fixed;top:0;left:0;z-index:" + s.z + ";opacity:" + s.o; j("body")[0].appendChild(u); k(), window.onresize = k; window.onmousemove = function (i) { i = i || window.event, f.x = i.clientX, f.y = i.clientY }, window.onmouseout = function () { f.x = null, f.y = null }; for (var t = [], p = 0; s.n > p; p++) { var h = a() * r, g = a() * n, q = 2 * a() - 1, d = 2 * a() - 1; t.push({ x: h, y: g, xa: q, ya: d, max: 6000 }) } setTimeout(function () { b() }, 100)
    }();
</script>