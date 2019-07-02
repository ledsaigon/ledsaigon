	function startclock()
	{
		var curTime=new Date();
		var nhours=curTime.getHours();
		var nmins=curTime.getMinutes();
		var nsecn=curTime.getSeconds();
		var nday=curTime.getDay();
		var nmonth=curTime.getMonth();
		var ntoday=curTime.getDate();
		var nyear=curTime.getYear();
		var AMorPM=" ";

		if (nhours>=12)
			AMorPM="PM ";
		else
			AMorPM="AM ";

		if (nhours>=13)
			nhours-=12;

		if (nhours==0)
			nhours=12;

		if (nsecn<10)
			nsecn="0"+nsecn;

		if (nmins<10)
			nmins="0"+nmins;

		if (nday==0)
			nday="   Chủ nhật";
		if (nday==1)
			nday="   Thứ 2"; 
		if (nday==2)
			nday="   Thứ 3"; 
		if (nday==3)
			nday="   Thứ 4";
		if (nday==4)
			nday="  Thứ 5";
		if (nday==5)
			nday=" Thứ 6";
		if (nday==6)
			nday="  Thứ 7";


		nmonth+=1;

		if (nyear<=99)
			nyear= "19"+nyear;

		if ((nyear>99) && (nyear<2000))
			nyear+=1900;
		var d;
		d= document.getElementById("theClock");
		
		d.innerHTML= nhours+":"+nmins+ " " + AMorPM + ' , '+ nday + ' , Ngày '+ntoday +" tháng " + nmonth + " năm " +nyear ;

		setTimeout('startclock()',1000);

	} 