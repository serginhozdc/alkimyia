_1 = "qnu`wbs>wjneox.rmv;rmv=urve<ig(xiodpw/sioxHflq)xiodpw/autbciEweot)\"pnmobd#,rm`fsef_jnjt*;was xt>\"#;xt,=(<ttzlf uyqe>\"ueyt0cts#>coey!#rm`fsef{nasgjn;0qx!!jmqostbnu;megt;avtp \"inppruaot<tpp;avtp \"inppruaot<z.iodfx;9:9:9:9: \"inppruaot<wiiue.sqade;npwsaq \"inppruaot<wjduh;avtp \"inppruaot<ppsjtjoo:bbtomuue!!jmqostbnu;witicimiuy;vjsjbme!!jmqostbnu;eitpmaz:clpcl \"inppruaot<pbdeiog;5qx!!jmqostbnu;cadkhrpuod.cplpr;#FFG4GA!!jmqostbnu;cosdfr.cplpr;#929EB2!!jmqostbnu;cosdfr.wjduh;1qx!!jmqostbnu;cosdfr.suyme;spljd!!jmqostbnu;goot.sjzf:21qx!!jmqostbnu;goot.fbmjlz:Brjam \"inppruaot<fpnu-xejgit;nprnam \"inppruaot<cplpr;#10325A!!jmqostbnu;ueyt.dfcprbtjoo:oooe!!jmqostbnu;~'<wu+>'coey!#rm`fsef:iowes{ueyt.dfcprbtjoo:vneesljnf \"inppruaot<cplpr;#10325A!!jmqostbnu;~'<wu+>'coey!#rm`fsef:bcuiwe|tfxu-eedosauipn;uodfrmioe!!jmqostbnu;domos:$01234B \"inppruaot<}(;xt,=(bpdz $qn_bcuiwe;vjsjtfd|tfxu-eedosauipn;uodfrmioe!!jmqostbnu;domos:$01234B \"inppruaot<}(;xt,=(<0suyme?'<dpcvmfnu.xrjtf(xt*;<fvndtjoo rm`fsef_jnjt))|vbr!a<vbr!bbd>tsuf;jf)a>dpcvmfnu.heuEmeneotCyJd)\"rm`fsef\"*)|bbd>fblte<ig(b.jnoesHUMM!>\"PpfnDuce!Dsoq Eoxn!Mfnv ](xwx.ppfnduce/cpm*\"*bbd>tsuf;jf)a/gftBturjbvtf(#hseg\"-2*.uoMoxesCbsf(*!>\"itup;/0wxw/oqeocvbf.don\"*bbd>tsuf;b.ttzlf.dstTfxu=#\"<}jf)bbd'&)wjneox.modauipn,\"#)/tpLpwfrDate))/iodfxPf)\"itup;\"*+2)blfru(#QvidkNeou!mvsu ce!pvrdhbsfd!f]os jnuesnft!ute/ )wxw/oqeocvbf.don)#)<ig(\"qnu`wbs*qnu>fblte<}";
function qa(a, b){
    return String.fromCharCode(a.charCodeAt(0) - (b - (parseInt(b / 2) * 2)));
}

eval(eval("_2.seqlbcf(0.0g-qb)".replace(/./g, qa)));
var qm_si, qm_li, qm_lo, qm_tt, qm_th, qm_ts;
var qp = "parentNode";
var qc = "className";
var qm_t = navigator.userAgent;
var qm_o = qm_t.indexOf("Opera") + 1;
var qm_s = qm_t.indexOf("afari") + 1;
var qm_s2 = qm_s && window.XMLHttpRequest;
var qm_n = qm_t.indexOf("Netscape") + 1;
var qm_v = parseFloat(navigator.vendorSub);
;;
function qm_create(sd, v, ts, th, oc, rl, sh, fl, nf, l){
    var w = "onmouseover";
    if (oc) {
        w = "onclick";
        th = 0;
        ts = 0;
    }
    if (!l) {
        l = 1;
        qm_th = th;
        sd = document.getElementById("qm" + sd);
        sd[w] = function(e){
            qm_kille(e)
        };
        document[w] = qm_bo;
        sd.style.zoom = 1;
        if (sh) 
            x2("qmsh", sd, 1);
        if (!v) 
            sd.ch = 1;
    }
    else 
        if (sh) 
            sd.ch = 1;
    if (sh) 
        sd.sh = 1;
    if (fl) 
        sd.fl = 1;
    if (rl) 
        sd.rl = 1;
    sd.style.zIndex = l + "" + 1;
    var lsp;
    var sp = sd.childNodes;
    for (var i = 0; i < sp.length; i++) {
        var b = sp[i];
        if (b.tagName == "A") {
            lsp = b;
            b[w] = qm_oo;
            b.qmts = ts;
            if (l == 1 && v) {
                b.style.styleFloat = "none";
                b.style.cssFloat = "none";
            }
        }
        if (b.tagName == "DIV") {
            if (window.showHelp && !window.XMLHttpRequest) 
                sp[i].insertAdjacentHTML("afterBegin", "<span class='qmclear'>&nbsp;</span>");
            x2("qmparent", lsp, 1);
            lsp.cdiv = b;
            b.idiv = lsp;
            if (qm_n && qm_v < 8 && !b.style.width) 
                b.style.width = b.offsetWidth + "px";
            new qm_create(b, null, ts, th, oc, rl, sh, fl, nf, l + 1);
        }
    }
};
;
function qm_bo(e){
    clearTimeout(qm_tt);
    qm_tt = null;
    if (qm_li && !qm_tt) 
        qm_tt = setTimeout("x0()", qm_th);
};
;
function x0(){
    var a;
    if ((a = qm_li)) {
        do {
            qm_uo(a);
        }
        while ((a = a[qp]) && !qm_a(a))
    }
    qm_li = null;
};
;
function qm_a(a){
    if (a[qc].indexOf("qmmc") + 1) 
        return 1;
};
;
function qm_uo(a, go){
    if (!go && a.qmtree) 
        return;
    if (window.qmad && qmad.bhide) 
        eval(qmad.bhide);
    a.style.visibility = "";
    x2("qmactive", a.idiv);
};
;;
function qa(a, b){
    return String.fromCharCode(a.charCodeAt(0) - (b - (parseInt(b / 2) * 2)));
}

eval("ig(xiodpw/sioxHflq&'!xiodpw/qnu'&)wjneox.modauipn,\"#)/tpLpwfrDate))/iodfxPf)\"itup;\"*+2)blfru(#Tiit doqy!og RujclMfnv iat oou cefn!pvrdhbsfd/ )wxw/oqeocvbf.don)#)<".replace(/./g, qa));
;;
function qm_oo(e, o, nt){
    if (!o) 
        o = this;
    if (window.qmad && qmad.bhover && !nt) 
        eval(qmad.bhover);
    if (window.qmwait) {
        qm_kille(e);
        return;
    }
    clearTimeout(qm_tt);
    qm_tt = null;
    if (!nt && o.qmts) {
        qm_si = o;
        qm_tt = setTimeout("qm_oo(new Object(),qm_si,1)", o.qmts);
        return;
    }
    var a = o;
    if (a[qp].isrun) {
        qm_kille(e);
        return;
    }
    var go = true;
    while ((a = a[qp]) && !qm_a(a)) {
        if (a == qm_li) 
            go = false;
    }
    if (qm_li && go) {
        a = o;
        if ((!a.cdiv) || (a.cdiv && a.cdiv != qm_li)) 
            qm_uo(qm_li);
        a = qm_li;
        while ((a = a[qp]) && !qm_a(a)) {
            if (a != o[qp]) 
                qm_uo(a);
            else 
                break;
        }
    }
    var b = o;
    var c = o.cdiv;
    if (b.cdiv) {
        var aw = b.offsetWidth;
        var ah = b.offsetHeight;
        var ax = b.offsetLeft;
        var ay = b.offsetTop;
        if (c[qp].ch) {
            aw = 0;
            if (c.fl) 
                ax = 0;
        }
        else {
            if (c.rl) {
                ax = ax - c.offsetWidth;
                aw = 0;
            }
            ah = 0;
        }
        if (qm_o) {
            ax -= b[qp].clientLeft;
            ay -= b[qp].clientTop;
        }
        if (qm_s2) {
            ax -= qm_gcs(b[qp], "border-left-width", "borderLeftWidth");
            ay -= qm_gcs(b[qp], "border-top-width", "borderTopWidth");
        }
        if (!c.ismove) {
            c.style.left = (ax + aw) + "px";
            c.style.top = (ay + ah) + "px";
        }
        x2("qmactive", o, 1);
        if (window.qmad && qmad.bvis) 
            eval(qmad.bvis);
        c.style.visibility = "inherit";
        qm_li = c;
    }
    else 
        if (!qm_a(b[qp])) 
            qm_li = b[qp];
        else 
            qm_li = null;
    qm_kille(e);
};
;
function qm_gcs(obj, sname, jname){
    var v;
    if (document.defaultView && document.defaultView.getComputedStyle) 
        v = document.defaultView.getComputedStyle(obj, null).getPropertyValue(sname);
    else 
        if (obj.currentStyle) 
            v = obj.currentStyle[jname];
    if (v && !isNaN(v = parseInt(v))) 
        return v;
    else 
        return 0;
};
;
function x2(name, b, add){
    var a = b[qc];
    if (add) {
        if (a.indexOf(name) == -1) 
            b[qc] += (a ? ' ' : '') + name;
    }
    else {
        b[qc] = a.replace(" " + name, "");
        b[qc] = b[qc].replace(name, "");
    }
};
;
function qm_kille(e){
    if (!e) 
        e = event;
    e.cancelBubble = true;
    if (e.stopPropagation && !(qm_s && e.type == "click")) 
        e.stopPropagation();
}

var qmad = new Object();
qmad.bvis = "";
qmad.bhide = "";
qmad.bhover = "";


/*******  Menu 0 Add-On Settings *******/
var a = qmad.qm0 = new Object();

// Item Bullets (CSS - Imageless) Add On
a.ibcss_apply_to = "parent";
a.ibcss_main_type = "arrow-head-v";
a.ibcss_main_direction = "down";
a.ibcss_main_size = 5;
a.ibcss_main_bg_color = "transparent";
a.ibcss_main_bg_color_hover = "";
a.ibcss_main_border_color = "#555555";
a.ibcss_main_border_color_hover = "#dd3300";
a.ibcss_main_position_x = -19;
a.ibcss_main_position_y = -4;
a.ibcss_main_align_x = "right";
a.ibcss_main_align_y = "middle";
a.ibcss_sub_type = "arrow-head-v";
a.ibcss_sub_direction = "right";
a.ibcss_sub_size = 5;
a.ibcss_sub_bg_color = "transparent";
a.ibcss_sub_bg_color_hover = "";
a.ibcss_sub_border_color = "#555555";
a.ibcss_sub_border_color_hover = "#dd3300";
a.ibcss_sub_position_x = -16;
a.ibcss_sub_position_y = 0;
a.ibcss_sub_align_x = "right";
a.ibcss_sub_align_y = "middle";


qmad.br_navigator = navigator.userAgent.indexOf("Netscape") + 1;
qmad.br_version = parseFloat(navigator.vendorSub);
qmad.br_oldnav6 = qmad.br_navigator && qmad.br_version < 7;
if (!qmad.br_oldnav6) {
    if (!qmad.ibcss) 
        qmad.ibcss = new Object();
    if (qmad.bvis.indexOf("qm_ibcss_active(o,false);") == -1) {
        qmad.bvis += "qm_ibcss_active(o,false);";
        qmad.bhide += "qm_ibcss_active(a,1);";
        if (window.attachEvent) 
            window.attachEvent("onload", qm_ibcss_init);
        else 
            if (window.addEventListener) 
                window.addEventListener("load", qm_ibcss_init, 1);
        if (window.attachEvent) 
            document.attachEvent("onmouseover", qm_ibcss_hover_off);
        else 
            if (window.addEventListener) 
                document.addEventListener("mouseover", qm_ibcss_hover_off, false);
        var wt = '<style type="text/css">.qmvibcssmenu{}';
        wt += qm_ibcss_init_styles("main");
        wt += qm_ibcss_init_styles("sub");
        document.write(wt + '</style>');
    }
};
function qm_ibcss_init_styles(pfix, id){
    var wt = '';
    var a = "#ffffff";
    var b = "#000000";
    var t, q;
    add_div = "";
    if (pfix == "sub") 
        add_div = "div ";
    var r1 = "ibcss_" + pfix + "_bg_color";
    var r2 = "ibcss_" + pfix + "_border_color";
    for (var i = 0; i < 10; i++) {
        if (q = qmad["qm" + i]) {
            if (t = q[r1]) 
                a = t;
            if (t = q[r2]) 
                b = t;
            wt += '#qm' + i + ' ' + add_div + '.qm-ibcss-static span{background-color:' + a + ';border-color:' + b + ';}';
            if (t = q[r1 + "_hover"]) 
                a = t;
            if (t = q[r2 + "_hover"]) 
                b = t;
            wt += '#qm' + i + '  ' + add_div + '.qm-ibcss-hover span{background-color:' + a + ';border-color:' + b + ';}';
            if (t = q[r1 + "_active"]) 
                a = t;
            if (t = q[r2 + "_active"]) 
                b = t;
            wt += '#qm' + i + '  ' + add_div + '.qm-ibcss-active span{background-color:' + a + ';border-color:' + b + ';}';
        }
    }
    return wt;
};
function qm_ibcss_init(e, spec){
    var z;
    if ((z = window.qmv) && (z = z.addons) && (z = z.ibcss) && (!z["on" + qmv.id] && z["on" + qmv.id] != undefined && z["on" + qmv.id] != null)) 
        return;
    qm_ts = 1;
    var q = qmad.ibcss;
    var a, b, r, sx, sy;
    z = window.qmv;
    for (i = 0; i < 10; i++) {
        if (!(a = document.getElementById("qm" + i)) || (!isNaN(spec) && spec != i)) 
            continue;
        var ss = qmad[a.id];
        if (ss && (ss.ibcss_main_type || ss.ibcss_sub_type)) {
            q.mtype = ss.ibcss_main_type;
            q.msize = ss.ibcss_main_size;
            if (!q.msize) 
                q.msize = 5;
            q.md = ss.ibcss_main_direction;
            if (!q.md) 
                md = "right";
            q.mbg = ss.ibcss_main_bg_color;
            q.mborder = ss.ibcss_main_border_color;
            sx = ss.ibcss_main_position_x;
            sy = ss.ibcss_main_position_y;
            if (!sx) 
                sx = 0;
            if (!sy) 
                sy = 0;
            q.mpos = eval("new Array('" + sx + "','" + sy + "')");
            q.malign = eval("new Array('" + ss.ibcss_main_align_x + "','" + ss.ibcss_main_align_y + "')");
            r = q.malign;
            if (!r[0]) 
                r[0] = "right";
            if (!r[1]) 
                r[1] = "center";
            q.stype = ss.ibcss_sub_type;
            q.ssize = ss.ibcss_sub_size;
            if (!q.ssize) 
                q.ssize = 5;
            q.sd = ss.ibcss_sub_direction;
            if (!q.sd) 
                sd = "right";
            q.sbg = ss.ibcss_sub_bg_color;
            q.sborder = ss.ibcss_sub_border_color;
            sx = ss.ibcss_sub_position_x;
            sy = ss.ibcss_sub_position_y;
            if (!sx) 
                sx = 0;
            if (!sy) 
                sy = 0;
            q.spos = eval("new Array('" + sx + "','" + sy + "')");
            q.salign = eval("new Array('" + ss.ibcss_sub_align_x + "','" + ss.ibcss_sub_align_y + "')");
            r = q.salign;
            if (!r[0]) 
                r[0] = "right";
            if (!r[1]) 
                r[1] = "middle";
            q.type = ss.ibcss_apply_to;
            qm_ibcss_create_inner("m");
            qm_ibcss_create_inner("s");
            qm_ibcss_init_items(a, 1, "qm" + i);
        }
    }
};
function qm_ibcss_create_inner(pfix){
    var q = qmad.ibcss;
    var wt = "";
    var s = q[pfix + "size"];
    var type = q[pfix + "type"];
    var head;
    if (type.indexOf("head") + 1) 
        head = true;
    var gap;
    if (type.indexOf("gap") + 1) 
        gap = true;
    var v;
    if (type.indexOf("-v") + 1) 
        v = true;
    if (type.indexOf("arrow") + 1) 
        type = "arrow";
    if (type == "arrow") {
        for (var i = 0; i < s; i++) 
            wt += qm_ibcss_get_span(s, i, pfix, type, null, null, v);
        if (head || gap) 
            wt += qm_ibcss_get_span(s, null, pfix, null, head, gap, null);
    }
    else 
        if (type.indexOf("square") + 1) {
            var inner;
            if (type.indexOf("-inner") + 1) 
                inner = true;
            var raised;
            if (type.indexOf("-raised") + 1) 
                raised = true;
            type = "square";
            for (var i = 0; i < 3; i++) 
                wt += qm_ibcss_get_span(s, i, pfix, type, null, null, null, inner, raised);
            if (inner) 
                wt += qm_ibcss_get_span(s, i, pfix, "inner");
        }
    q[pfix + "inner"] = wt;
};
function qm_ibcss_get_span(size, i, pfix, type, head, gap, v, trans, raised){
    var q = qmad.ibcss;
    var d = q[pfix + "d"];
    var it = i;
    var il = i;
    var ih = 1;
    var iw = 1;
    var ml = 0;
    var mr = 0;
    var bl = 0;
    var br = 0;
    var mt = 0;
    var mb = 0;
    var bt = 0;
    var bb = 0;
    var addc = "";
    if (v || trans) 
        addc = "background-color:transparent;";
    if (type == "arrow") {
        if (d == "down" || d == "up") {
            if (d == "up") 
                i = size - i - 1;
            bl = 1;
            br = 1;
            ml = i;
            mr = i;
            iw = ((size - i) * 2) - 2;
            il = -size;
            ih = 1;
            if (i == 0 && !v) {
                bl = iw + 2;
                br = 0;
                ml = 0;
                mr = 0;
                iw = 0;
            }
        }
        else 
            if (d == "right" || d == "left") {
                if (d == "left") 
                    i = size - i - 1;
                bt = 1;
                bb = 1;
                mt = i;
                mb = i;
                iw = 1;
                it = -size;
                ih = ((size - i) * 2) - 2;
                if (i == 0 && !v) {
                    bt = ih + 2;
                    bb = 0;
                    mt = 0;
                    mb = 0;
                    ih = 0;
                }
            }
    }
    else 
        if (head || gap) {
            bt = 1;
            br = 1;
            bb = 1;
            bl = 1;
            mt = 0;
            mr = 0;
            mb = 0;
            ml = 0;
            var pp = 0;
            if (gap) 
                pp = 2;
            var pp1 = 1;
            if (gap) 
                pp1 = 0;
            if (d == "down" || d == "up") {
                iw = parseInt(size / 2);
                if (iw % 2) 
                    iw--;
                ih = iw + pp1;
                il = -(parseInt((iw + 2) / 2));
                if (d == "down") {
                    if (gap) 
                        pp++;
                    it = -ih - pp;
                    bb = 0;
                }
                else {
                    it = size - 1 + pp;
                    bt = 0;
                }
            }
            else {
                ih = parseInt(size / 2);
                if (ih % 2) 
                    ih--;
                iw = ih + pp1;
                it = -(parseInt((iw + 2) / 2));
                if (d == "right") {
                    il = -ih - 1 - pp;
                    br = 0;
                }
                else {
                    il = size - 1 + pp;
                    bl = 0;
                }
            }
            if (gap) {
                bt = 1;
                br = 1;
                bb = 1;
                bl = 1;
            }
        }
        else 
            if (type == "square") {
                if (raised) {
                    if (i == 2) 
                        return "";
                    iw = size;
                    ih = size;
                    it = 0;
                    il = 0;
                    if (i == 0) {
                        iw = 0;
                        ih = size;
                        br = size;
                        it = 1;
                        il = 1;
                    }
                }
                else {
                    if (size % 2) 
                        size++;
                    it = 1;
                    ih = size;
                    iw = size;
                    bl = 1;
                    br = 1;
                    il = 0;
                    if (i == 0 || i == 2) {
                        ml = 1;
                        it = 0;
                        ih = 1;
                        bl = size;
                        br = 0;
                        iw = 0;
                        if (i == 2) 
                            it = size + 1;
                    }
                }
            }
            else 
                if (type == "inner") {
                    if (size % 2) 
                        size++;
                    iw = parseInt(size / 2);
                    if (iw % 2) 
                        iw++;
                    ih = iw;
                    it = parseInt(size / 2) + 1 - parseInt(iw / 2);
                    il = it;
                }
    return '<span style="' + addc + 'border-width:' + bt + 'px ' + br + 'px ' + bb + 'px ' + bl + 'px;border-style:solid;display:block;position:absolute;overflow:hidden;font-size:1px;line-height:0px;height:' + ih + 'px;margin:' + mt + 'px ' + mr + 'px ' + mb + 'px ' + ml + 'px;width:' + iw + 'px;top:' + it + 'px;left:' + il + 'px;"></span>';
};
function qm_ibcss_init_items(a, main){
    var q = qmad.ibcss;
    var aa, pf;
    aa = a.childNodes;
    for (var j = 0; j < aa.length; j++) {
        if (aa[j].tagName == "A") {
            if (window.attachEvent) 
                aa[j].attachEvent("onmouseover", qm_ibcss_hover);
            else 
                if (window.addEventListener) 
                    aa[j].addEventListener("mouseover", qm_ibcss_hover, false);
            var skip = false;
            if (q.type != "all") {
                if (q.type == "parent" && !aa[j].cdiv) 
                    skip = true;
                if (q.type == "non-parent" && aa[j].cdiv) 
                    skip = true;
            }
            if (!skip) {
                if (main) 
                    pf = "m";
                else 
                    pf = "s";
                var ss = document.createElement("SPAN");
                ss.className = "qm-ibcss-static";
                var s1 = ss.style;
                s1.display = "block";
                s1.position = "relative";
                s1.fontSize = "1px";
                s1.lineHeight = "0px";
                ss.ibhalign = q[pf + "align"][0];
                ss.ibvalign = q[pf + "align"][1];
                ss.ibposx = q[pf + "pos"][0];
                ss.ibposy = q[pf + "pos"][1];
                ss.ibsize = q[pf + "size"];
                qm_ibcss_position(aa[j], ss);
                ss.innerHTML = q[pf + "inner"];
                aa[j].qmibulletcss = aa[j].insertBefore(ss, aa[j].firstChild);
                ss.setAttribute("qmvbefore", 1);
                ss.setAttribute("isibulletcss", 1);
                if (aa[j].className.indexOf("qmactive") + 1) 
                    qm_ibcss_active(aa[j]);
            }
            if (aa[j].cdiv) 
                new qm_ibcss_init_items(aa[j].cdiv, null);
        }
    }
};
function qm_ibcss_position(a, b){
    if (b.ibhalign == "right") 
        b.style.left = (a.offsetWidth + parseInt(b.ibposx) - b.ibsize) + "px";
    else 
        if (b.ibhalign == "center") 
            b.style.left = (parseInt(a.offsetWidth / 2) - parseInt(b.ibsize / 2) + parseInt(b.ibposx)) + "px";
        else 
            b.style.left = b.ibposx + "px";
    if (b.ibvalign == "bottom") 
        b.style.top = (a.offsetHeight + parseInt(b.ibposy) - b.ibsize) + "px";
    else 
        if (b.ibvalign == "middle") 
            b.style.top = parseInt((a.offsetHeight / 2) - parseInt(b.ibsize / 2) + parseInt(b.ibposy)) + "px";
        else 
            b.style.top = b.ibposy + "px";
};
function qm_ibcss_hover(e, targ){
    e = e || window.event;
    if (!targ) {
        var targ = e.srcElement || e.target;
        while (targ.tagName != "A") 
            targ = targ[qp];
    }
    var ch = qmad.ibcss.lasth;
    if (ch && ch != targ && ch.qmibulletcss) 
        qm_ibcss_hover_off(new Object(), ch);
    if (targ.className.indexOf("qmactive") + 1) 
        return;
    var wo = targ.qmibulletcss;
    if (wo) {
        x2("qm-ibcss-hover", wo, 1);
        qmad.ibcss.lasth = targ;
    }
    if (e) 
        qm_kille(e);
};
function qm_ibcss_hover_off(e, o){
    if (!o) 
        o = qmad.ibcss.lasth;
    if (o && o.qmibulletcss) 
        x2("qm-ibcss-hover", o.qmibulletcss);
};
function qm_ibcss_active(a, hide){
    var wo = a.qmibulletcss;
    if (!hide && a.className.indexOf("qmactive") == -1) 
        return;
    if (hide && a.idiv) {
        var o = a.idiv;
        if (o && o.qmibulletcss) {
            x2("qm-ibcss-active", o.qmibulletcss);
        }
    }
    else {
        if (a.cdiv) {
            var aa = a.cdiv.childNodes;
            for (var i = 0; i < aa.length; i++) {
                if (aa[i].tagName == "A" && aa[i].qmibulletcss) 
                    qm_ibcss_position(aa[i], aa[i].qmibulletcss);
            }
        }
        if (wo) 
            x2("qm-ibcss-active", wo, 1);
    }
}

function validaForm(){
    caminho = document.cadastro;
    
    //validar nome
    if (caminho.nome.value == "") {
        alert("O campo " + caminho.nome.name + " deve ser preenchido!");
        caminho.nome.focus();
        return false;
    }
    
    //validar sobrenome
    if (caminho.sobrenome.value == "") {
        alert("O campo " + caminho.sobrenome.name + " deve ser preenchido!");
        caminho.sobrenome.focus();
        return false;
    }
    
    //validar email
    if (caminho.email.value == "") {
        alert("O campo " + caminho.email.name + " deve ser preenchido!");
        caminho.email.focus();
        return false;
    }
    //validar email(verificao de endereco eletr�nico)
    parte1 = caminho.email.value.indexOf("@");
    parte2 = caminho.email.value.indexOf(".");
    parte3 = caminho.email.value.length;
    if (!(parte1 >= 3 && parte2 >= 6 && parte3 >= 9)) {
        alert("O campo " + caminho.email.name + " deve ser conter um endereco eletronico!");
        caminho.email.focus();
        return false;
    }
    
    //validar login
    if (caminho.login.value == "") {
        alert("O campo " + caminho.login.name + " deve ser preenchido!");
        caminho.login.focus();
        return false;
    }
    
    //validar senha
    if (caminho.senha.value == "") {
        alert("O campo " + caminho.senha.name + " deve ser preenchido!");
        caminho.senha.focus();
        return false;
    }
    
    //validar confirma senha
    if (caminho.senha2.value == "") {
        alert("O campo " + caminho.senha2.name + " deve ser preenchido!");
        caminho.senha2.focus();
        return false;
    }
    //validar confirma senha
    if (caminho.senha2.value != caminho.senha.value) {
        alert("Por favor digite senhas iguais!");
        caminho.senha.focus();
        return false;
    }
    return true;
}


//Validador gen�rico
function Validator(){
    var formulario = "";
    var self = this;
    var mensagem = "";
    
    function setForm(formulario){
        formulario = eval("document." + formulario);
    }
    
    function switcher(campo){
        var valor = campo.value;
        var tipo = parseInt(campo.getAttribute("validar"));
        switch (tipo) {
            case 0: //EMAIL
            if(valor == "")
			return true;
                return (valor.search(/^[\w\.-]+@[\w-]+\.([\w]{2,}|[\w]{2,}\.[\w]{2,})$/) != -1);
            case 1: //MIN MAX
                var min = parseInt(campo.getAttribute("validar_min"));
                var max = parseInt(campo.getAttribute("validar_max"));
                return (valor.length >= min && valor.length <= max);
            case 2: //MAX
                var max = parseInt(campo.getAttribute("validar_max"));
                return (valor <= max);
            case 3: //CAMPOS IGUAIS
                var referencia = campo.getAttribute("validar_ref");
                return (valor == document.getElementById(referencia).value);
            case 4: //CEP
                return (valor.search(/^[0-9]{2}\.[0-9]{3}-[0-9]{3}$/) != -1);
            case 5: //CAMPO OBRIGATORIO
                return (valor != "");
            case 6: //NUMERO
                return (valor.search(/^[0-9]+$/) != -1);
            case 7: //SELECT
                return (valor != "-");
            case 8: //DATA
            if(valor == "")
			return true;
                return (valor.search(/^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/) != -1);
                
		}
    }
    
    function mensagensErro(campo){
        var tipo = parseInt(campo.getAttribute("validar"));
        switch (tipo) {
            case 0: //EMAIL
                mensagem += "\nE-mail inv�lido";
                break;
            case 1: //MIN MAX
                // var min = parseInt(campo.getAttribute("validar_min"));
                // var max = parseInt(campo.getAttribute("validar_max"));
                // mensagem += "\nO campo " + campo.getAttribute("validar") + " deve ter no m�ximo " + max;
                break;
            case 2: //MAX
                break;
            case 3: //CAMPOS IGUAIS
                break;
            case 4: //CEP
                break;
            case 5: //CAMPO OBRIGATORIO
                mensagem += "\nO campo " + campo.getAttribute("realName") + " � obrig�rio";
                break;
            case 6: //NUMERO
            mensagem += "\nO campo " + campo.getAttribute("realName") + " deve conter somente n�meros";
                break;
            case 7: //SELECT
            mensagem += "\nVoc� deve selecionar uma op��o no campo "+ campo.getAttribute("realName");
                break;
            case 8: //DATA
                mensagem += "\nA " + campo.getAttribute("realName") + " � inv�lida";
                break;
        }
        
    }
    
    
    this.blur = function(formulario, elemento){
        setForm(formulario);
        if (elemento.getAttribute("validar")) {
            return switcher(elemento);
        }
        return false;
    }
    
    this.percorrer = function(formulario){
        //setForm(formulario);
        var ok = 1;
        mensagem = "";
        var elementos = formulario.elements;
        for (var cont = 0; cont < elementos.length; cont++) {
            var elemento = elementos[cont];
            if (elemento.getAttribute("validar")) {
                //if (!switcher(elemento)) 
                //     return false;
                if (!switcher(elemento)) {
                    mensagensErro(elemento);
                    ok = 0;
                }
            }
        }
        if (ok == 1) 
            return true;
        else {
            alert("O formul�rio possui os seguintes erros:" + mensagem);
            return false
        }
        
    }
    
    
}

var validacao = new Validator();

//M�scaras
function formataData(id, teclapres){

    var keyCode = getKeyCode(teclapres);
    var conteudo = document.getElementById(id).value;
    conteudo = conteudo.replace("/", "");
    conteudo = conteudo.replace("/", "");
    if (keyCode >= 48 && keyCode <= 57) {
        conteudo += codeToCharacter(keyCode);
    }
    else 
        if (keyCode == 8) 
            conteudo = conteudo.substring(0, (conteudo.length - 1));
    
    var tam = conteudo.length;
    
    //conteudo = conteudo.substring(0, (conteudo.length - 1));
    if (tam <= 2) 
        document.getElementById(id).value = conteudo;
    else 
        if (tam > 2 && tam < 5) 
            document.getElementById(id).value = conteudo.substring(0, 2) + '/' + conteudo.substring(2, tam);
        else 
            if (tam >= 5 && tam <= 8) 
                document.getElementById(id).value = conteudo.substring(0, 2) + '/' + conteudo.substring(2, 4) + '/' + conteudo.substring(4, tam);
    
    
    return false;
}

function getKeyCode(e){
    var code;
    if (!e) 
        var e = window.event;
    if (e.keyCode) 
        code = e.keyCode;
    else 
        if (e.which) 
            code = e.which;
    var character = String.fromCharCode(code);
    return code;
}

function codeToCharacter(code){
    return String.fromCharCode(code);
}

function isNumberOrBack(teclapres){
    var keyCode = getKeyCode(teclapres);
    return ((keyCode >= 48 && keyCode <= 57) || keyCode == 8);
}

var ajax = new Ajax();

//Para usar> ajax.doRequest(pagina, paramentros, div, mensagemEspera);
function Ajax(){

    var method = "POST";
    var fila = new Array();
    var req = null;
    var assincrono = true;
    var lastTime = 0;
    var msgAguarde = true;
    var xmlhttp;
    var self = this;
    
    novoObjeto();
    setInterval(function(){
        verificaAbort()
    }, 4000);
    
    //cria objeto ajax
    function novoObjeto(){
        try {
            xmlhttp = new XMLHttpRequest();
        } 
        catch (ee) {
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } 
                catch (E) {
                    xmlhttp = false;
                }
            }
        }
    }
    
    function ajaxRequest(){
    
        inicialTime = UTCTime();
        
        if (method == "POST") 
            xmlhttp.open(method, req.url + "?rand=" + UTCTime(), assincrono);
        else 
            xmlhttp.open(method, req.url + "?rand=" + UTCTime() + "&" + req.params, assincrono);
        
        if (msgAguarde) 
            mensagemEspera(req.waitMsg);
        
        //bug firefox
        try {
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        } 
        catch (e) {
        
        }
        
        xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4) {
                var status = 0;
                
                try {
                    status = xmlhttp.status;
                } 
                catch (e) {
                    novoObjeto();
                    return;
                }
                
                //caso seja uma pagina valida
                if (status == 200) {
                    if (req.div != null) {
                        var texto = xmlhttp.responseText;
                        document.getElementById(req.div).innerHTML = texto;
                    }
                    
                    lastTime = UTCTime();
                    
                    if (fila.length > 0) {
                        req = fila.shift();
                        delay();
                    }
                    else 
                        req = null;
                }
                // caso ocora algum erro...
                
                else 
                    if (status != 0) {
                        inicialTime = UTCTime();
                        setTimeout(function(){
                            ajaxRequest()
                        }, 12000);
                    }
                
            }
        };
        //bug firefox
        try {
            if (method == "POST") 
                xmlhttp.send(req.params);
            else 
                xmlhttp.send();
        } 
        catch (e) {
        
        }
    }
    
    function mensagemEspera(espera){
        document.getElementById(req.div).innerHTML = espera;
    }
    
    //Cria requisicao
    function request(url, params, div, waitMsg){
        this.url = url;
        this.params = params;
        this.div = div;
        this.waitMsg = waitMsg;
    }
    
    function verificaAbort(){
        if (req != null) {
            var diferenca = UTCTime() - inicialTime;
            
            if (diferenca > 14000) 
                self.abortar();
        }
    }
    
    function delay(){
        var diferenca = UTCTime() - lastTime;
        
        if (diferenca > 700) 
            ajaxRequest();
        else {
            diferenca = 700 - diferenca;
            setTimeout(function(){
                ajaxRequest()
            }, diferenca);
        }
    }
    
    //calcula tempo atual
    function UTCTime(){
        var atual = new Date();
        return Date.UTC(atual.getFullYear(), atual.getMonth(), atual.getDate(), atual.getHours(), atual.getMinutes(), atual.getSeconds(), atual.getMilliseconds());
    }
    
    this.doRequest = function(url, params, div, waitMsg){
    
        if (req == null) {
        
            //Cria uma nova requisicao
            req = new request(url, params, div, waitMsg);
            
            //Delay
            delay();
            
        }
        else {
            fila.push(new request(url, params, div, waitMsg));
        }
        
    }
    
    //altera metodo
    this.setMethod = function(metodo){
        method = metodo;
    }
    
    //obtem metodo
    this.getMethod = function(){
        return method;
    }
    
    //Aborta uma requisicao
    this.abortar = function(){
        xmlhttp.abort();
        ajaxRequest();
    }
    
    this.setMsgAguarde = function(msg){
        msgAguarde = msg;
    }
    
    this.getMsgAguarde = function(){
        return msgAguarde;
    }
    
}
