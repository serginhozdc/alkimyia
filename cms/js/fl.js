function flash(dia,mes,ano){

document.write("<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0' width='208' height='217' id='calendario' align='middle'><param name='allowScriptAccess' value='sameDomain' /><param name='movie' value='calendario.swf?dia="+dia+"&mes="+mes+"&ano="+ano+"' /><param name='quality' value='high' /><param name='bgcolor' value='#ffffff' /><embed src='calendario.swf?dia="+dia+"&mes="+mes+"&ano="+ano+"' quality='high' bgcolor='#ffffff' width='208' height='217' name='calendario' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /></object>");
}