// this sets the background color of the master UIView (when there are no windows/tab groups on it)
Titanium.UI.setBackgroundColor('#000');


// create tab group
var tabGroup = Titanium.UI.createTabGroup();


							/**
							 * In this example, we'll use the Barcode module to display some information about
							 * the scanned barcode.
							 */
							var Barcode = require('ti.barcode');
							Barcode.allowRotation = true;
							Barcode.displayedMessage = ' ';
							Barcode.allowMenu = false;
							Barcode.allowInstructions = false;
							Barcode.useLED = false;




//
// Window 1 Dashboard
//
var win1 = Titanium.UI.createWindow({  
    title:'Tab 1',
    backgroundColor:'#fff',
    backgroundImage:'images/background01.png',
    navBarHidden:true,
});
win1.orientationModes = [ Titanium.UI.LANDSCAPE_LEFT ];

var tab1 = Titanium.UI.createTab({  
    icon:'KS_nav_views.png',
    title:'Tab 1',
    window:win1
});

var myname = 'Navarro Palos, Mario';
var myid = '9032';

var myname_lbl = Titanium.UI.createLabel({
	text: 'Welcome : '+myname,
	font:{fontFamily:"HelveticaCondensedBold",fontSize:20},
	color:'white',
	top:0,
	left:5,
	width:600,
	height:30,
	
})
win1.add(myname_lbl);
var myid_lbl = Titanium.UI.createLabel({
	text: 'User ID : '+myid,
	font:{fontFamily:"HelveticaCondensedBold",fontSize:20},
	color:'white',
	top:50,
	left:5,
	width:600,
	height:30,
	
})
win1.add(myid_lbl);


users_btn = Ti.UI.createButton({
	title:"Login",
	left:860,
	top:50,
	width:150,
	height:50,
});
win1.add(users_btn);
////////prueba
//Titanium.Geolocation.distanceFilter = 10; // set the granularity of the location event
 
	Titanium.Geolocation.getCurrentPosition(function(e)
	{
		if (e.error)
		{
                // manage the error
                return;
		}
 
		var longitude = e.coords.longitude;
		var latitude = e.coords.latitude;
		var altitude = e.coords.altitude;
		var heading = e.coords.heading;
		var accuracy = e.coords.accuracy;
		var speed = e.coords.speed;
		var timestamp = e.coords.timestamp;
		var altitudeAccuracy = e.coords.altitudeAccuracy;
		
		var mylocation_msg = Ti.UI.createAlertDialog({
			title:'My Current Location',
			message:"Longitude = "+longitude+" Latitude = "+latitude,
		})
		mylocation_msg.show();
		
		var mapview = Titanium.Map.createView({
		top:110,
		height:570,
		width:800,
		left:20,
		mapType: Titanium.Map.STANDARD_TYPE,
		region:{latitude:latitude, longitude:longitude, latitudeDelta:0.5, longitudeDelta:0.5},
		animate:true,
		regionFit:true,
		userLocation:true
		});
		win1.add(mapview);
	});




///Popup Login, Register or Recover Password
users_btn.addEventListener('click', function()
{
var t = Titanium.UI.create2DMatrix();
	t = t.scale(0);

	var w = Titanium.UI.createWindow({
		backgroundImage:'images/backlogin.png',
		layout:'vertical',
		borderWidth:4,
		borderColor:'#ffffff',
		//height:450,
		//width:320,
		height:430,
		width:300,
		borderRadius:10,
		opacity:0.92,
		transform:t
	});

	// create first transform to go beyond normal size
	var t1 = Titanium.UI.create2DMatrix();
	t1 = t1.scale(1.1);
	var a = Titanium.UI.createAnimation();
	a.transform = t1;
	a.duration = 200;

	// when this animation completes, scale to normal size
	a.addEventListener('complete', function()
	{
		Titanium.API.info('here in complete');
		var t2 = Titanium.UI.create2DMatrix();
		t2 = t2.scale(1.0);
		w.animate({transform:t2, duration:200});

	});
	//Label Title for Step1 Type Message
	var label_popup = Ti.UI.createLabel({
		text:'User Options',
		width:'100%',
		height:50,
		textAlign:'center',
		color:'white',
		shadowColor:'black',
		shadowOffset:{x:0,y:1},
		font:{fontWeight:'bold',fontSize:18}
	});
	w.add(label_popup);
	
	
	
	//Button for login
	var login_btn = Ti.UI.createButton({
		backgroundImage:'images/backbutton.png',
		borderRadius:10,
		top:20,
		title:'Login',
		width:200,
		height:50,
		font:{fontWeight:'bold',fontSize:18}
	}) 
	w.add(login_btn);
	
	
							///// Login action
							login_btn.addEventListener('click', function()
							{
								
							var t = Titanium.UI.create2DMatrix();
								t = t.scale(0);
							
								var w = Titanium.UI.createWindow({
									backgroundImage:'images/backlogin.png',
									layout:'vertical',
									borderWidth:4,
									borderColor:'#ffffff',
									//height:450,
									//width:320,
									height:430,
									width:300,
									borderRadius:10,
									opacity:0.92,
									transform:t
								});
							
								// create first transform to go beyond normal size
								var t1 = Titanium.UI.create2DMatrix();
								t1 = t1.scale(1.1);
								var a = Titanium.UI.createAnimation();
								a.transform = t1;
								a.duration = 200;
							
								// when this animation completes, scale to normal size
								a.addEventListener('complete', function()
								{
									Titanium.API.info('here in complete');
									var t2 = Titanium.UI.create2DMatrix();
									t2 = t2.scale(1.0);
									w.animate({transform:t2, duration:200});
							
								});
								//Label Title for Step1 Type Message
								var label_popup = Ti.UI.createLabel({
									text:'Please type your credentials',
									width:'100%',
									height:50,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:18}
								});
								w.add(label_popup);
								
								var lbl_User = Titanium.UI.createLabel({
								  text:'Username',
								  height:30,
								  width:100,
								  color:'#ffffff',
								  font: {fontSize:16},
								  top: 5
								});
								w.add(lbl_User);
								var txt_User = Titanium.UI.createTextField({
								  width: 150,
								  color: "#222",
								  backgroundColor:'white',
								  paddingLeft: 5,
								  border: 1,
								  borderColor: "gray",
								  borderRadius: 3,
								  font:{fontSize:16},
								  height:30,
								  top: 5
								});
								w.add(txt_User);
								var lbl_Pass = Titanium.UI.createLabel({
								  text:'Password',
								  height:30,
								  width:100,
								  color:'#ffffff',
								  font:{fontSize:16},
								  top: 10
								});
								w.add(lbl_Pass);
								var txt_Pass = Titanium.UI.createTextField({
								  backgroundColor:'white',
								  width: 150,
								  color: "#222",
								  paddingLeft: 5,
								  border: 1,
								  borderColor: "gray",
								  borderRadius: 3,
								  passwordMask: true,
								  font:{fontSize:16},
								  height:30,
								  top: 2 
								});
								w.add(txt_Pass);
								
								// create a send button to login
								var s = Titanium.UI.createButton({
									backgroundImage:'images/backbutton.png',
									title:'Login',
									height:40,
									width:150,
									top:70,	
								});
							
								// create a button to close window
								var b = Titanium.UI.createButton({
									backgroundImage:'images/backcancel.png',
									title:'Cancel',
									height:40,
									width:150,
									top:20,
									style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,
									
								    
								});
								w.add(s);
								w.add(b);
								
								b.addEventListener('click', function()
								{
									var t3 = Titanium.UI.create2DMatrix();
									t3 = t3.scale(0);
									w.close({transform:t3,duration:300});
								});
								
								//Inizialice Components
								w.open(a);	
							});
	
	
	
	
	
	
	
	
	//Button for Register
	var register_btn = Ti.UI.createButton({
		borderRadius:10,
		backgroundImage:'images/backbutton.png',
		top:30,
		title:'New User',
		width:200,
		height:'50',
		font:{fontWeight:'bold',fontSize:18}
	}) 
	w.add(register_btn);
	
							///// Register new user action
							register_btn.addEventListener('click', function()
							{
							var t = Titanium.UI.create2DMatrix();
								t = t.scale(0);
							
								var w = Titanium.UI.createWindow({
									backgroundImage:'images/backlogin.png',
									layout:'vertical',
									borderWidth:4,
									borderColor:'#ffffff',
									//height:450,
									//width:320,
									height:430,
									width:300,
									borderRadius:10,
									opacity:0.92,
									transform:t
								});
							
								// create first transform to go beyond normal size
								var t1 = Titanium.UI.create2DMatrix();
								t1 = t1.scale(1.1);
								var a = Titanium.UI.createAnimation();
								a.transform = t1;
								a.duration = 200;
							
								// when this animation completes, scale to normal size
								a.addEventListener('complete', function()
								{
									Titanium.API.info('here in complete');
									var t2 = Titanium.UI.create2DMatrix();
									t2 = t2.scale(1.0);
									w.animate({transform:t2, duration:200});
							
								});
								//Label Title for Step1 Type Message
								var label_popup = Ti.UI.createLabel({
									text:'Register New User',
									width:'100%',
									height:50,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:18}
								});
								w.add(label_popup);
								
								
							
								// create a button to close window
								var b = Titanium.UI.createButton({
									backgroundImage:'images/backcancel.png',
									title:'Cancel',
									height:40,
									width:150,
									top:70,
									style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,
									
								    
								});
								w.add(b);
								b.addEventListener('click', function()
								{
									var t3 = Titanium.UI.create2DMatrix();
									t3 = t3.scale(0);
									w.close({transform:t3,duration:300});
								});
								
								//Inizialice Components
								w.open(a);	
							});
	
	
	
	
	
	//Button for Recover Password
	var recover_btn = Ti.UI.createButton({
		borderRadius:10,
		backgroundImage:'images/backbutton.png',
		top:30,
		title:'Forgot Password',
		width:200,
		height:'50',
		font:{fontWeight:'bold',fontSize:18}
	}) 
	w.add(recover_btn);
	
	
							///// Recover Password action
							recover_btn.addEventListener('click', function()
							{
							var t = Titanium.UI.create2DMatrix();
								t = t.scale(0);
							
								var w = Titanium.UI.createWindow({
									backgroundImage:'images/backlogin.png',
									layout:'vertical',
									borderWidth:4,
									borderColor:'#ffffff',
									//height:450,
									//width:320,
									height:430,
									width:300,
									borderRadius:10,
									opacity:0.92,
									transform:t
								});
							
								// create first transform to go beyond normal size
								var t1 = Titanium.UI.create2DMatrix();
								t1 = t1.scale(1.1);
								var a = Titanium.UI.createAnimation();
								a.transform = t1;
								a.duration = 200;
							
								// when this animation completes, scale to normal size
								a.addEventListener('complete', function()
								{
									Titanium.API.info('here in complete');
									var t2 = Titanium.UI.create2DMatrix();
									t2 = t2.scale(1.0);
									w.animate({transform:t2, duration:200});
							
								});
								//Label Title for Step1 Type Message
								var label_popup = Ti.UI.createLabel({
									text:'Forgot password',
									width:'100%',
									height:50,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:18}
								});
								w.add(label_popup);
								
								
							
								// create a button to close window
								var b = Titanium.UI.createButton({
									backgroundImage:'images/backcancel.png',
									title:'Cancel',
									height:40,
									width:150,
									top:70,
									style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,
									
								    
								});
								w.add(b);
								b.addEventListener('click', function()
								{
									var t3 = Titanium.UI.create2DMatrix();
									t3 = t3.scale(0);
									w.close({transform:t3,duration:300});
								});
								
								//Inizialice Components
								w.open(a);	
							});
	
	

	// create a button to close window
	var b = Titanium.UI.createButton({
		backgroundImage:'images/backcancel.png',
		title:'Cancel',
		height:40,
		width:150,
		top:70,
		style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,
		
	    
	});
	w.add(b);
	b.addEventListener('click', function()
	{
		var t3 = Titanium.UI.create2DMatrix();
		t3 = t3.scale(0);
		w.close({transform:t3,duration:300});
	});
	
	//Inizialice Components
	w.open(a);	
});

samples_btn = Ti.UI.createButton({
	title:"Samples",
	left:860,
	top:110,
	width:150,
	height:50,
});
win1.add(samples_btn);

//////Option Dialog for Samples
		var optionsDialogOpts = {
			options:['New Sample', 'Search for Sample', 'Cancel'],
			destructive:2,
		};
		var dialog = Titanium.UI.createOptionDialog(optionsDialogOpts);
		
		//Events for optionDialog
		dialog.addEventListener('click',function(e)
		{
			if (e.index == 0)//New Sample
                {
                	///// Take new sample
							var t = Titanium.UI.create2DMatrix();
								t = t.scale(0);
							
								var w = Titanium.UI.createWindow({
									backgroundImage:'images/backlogin.png',
									layout:'vertical',
									borderWidth:4,
									borderColor:'#ffffff',
									//height:450,
									//width:320,
									height:700,
									width:900,
									borderRadius:10,
									opacity:0.92,
									transform:t
								});
							
								// create first transform to go beyond normal size
								var t1 = Titanium.UI.create2DMatrix();
								t1 = t1.scale(1.1);
								var a = Titanium.UI.createAnimation();
								a.transform = t1;
								a.duration = 200;
							
								// when this animation completes, scale to normal size
								a.addEventListener('complete', function()
								{
									Titanium.API.info('here in complete');
									var t2 = Titanium.UI.create2DMatrix();
									t2 = t2.scale(1.0);
									w.animate({transform:t2, duration:200});
							
								});
								//Label Title for Step1 Type Message
								var label_popup = Ti.UI.createLabel({
									text:'Taking new Sample',
									width:'100%',
									height:30,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:18}
								});
								w.add(label_popup);
								
								var label_name = Ti.UI.createLabel({
									text:'Name',
									width:'100%',
									height:30,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:12}
								});
								w.add(label_name);
								var field_name = Ti.UI.createTextField({
									backgroundColor:'white',
									top:5,
									width:'100',
									height:'30',
								})
								w.add(field_name);
								
								var photo1 = Ti.UI.createImageView({
									backgroundColor:'white',
									image:'',
									top:5,
									height:150,
									width:150,
								})
								w.add(photo1)
								
								var photo1_btn = Ti.UI.createButton({
									title:'Take it',
									top:5,
									width:100,
									height:30,
								})
								w.add(photo1_btn);
										photo1_btn.addEventListener('click', function()
										{
											Titanium.Media.showCamera({

												success:function(event)
												{
													var cropRect = event.cropRect;
													var image = event.media;
										
													Titanium.Media.saveToPhotoGallery(image);
													///
													photo1.image = image;
										
													Titanium.UI.createAlertDialog({title:'Photo Gallery',message:'Check your photo gallery'}).show();		
												},
												cancel:function()
												{
										
												},
												error:function(error)
												{
													// create alert
													var a = Titanium.UI.createAlertDialog({title:'Camera'});
										
													// set message
													if (error.code == Titanium.Media.NO_CAMERA)
													{
														a.setMessage('Device does not have video recording capabilities');
													}
													else
													{
														a.setMessage('Unexpected error: ' + error.code);
													}
										
													// show alert
													a.show();
												},
												allowEditing:true
											});
										});	
										
								var photo1_btn2 = Ti.UI.createButton({
									title:'Gallery',
									top:5,
									width:100,
									height:30,
								})
								w.add(photo1_btn2);	
										photo1_btn2.addEventListener('click', function()
										{
											function openGallery() {
												Titanium.Media.openPhotoGallery({
											
													success:function(event)
													{
														var cropRect = event.cropRect;
														var image = event.media;
											
														// set image view
														Ti.API.debug('Our type was: '+event.mediaType);
														if(event.mediaType == Ti.Media.MEDIA_TYPE_PHOTO)
														{
															photo1.image = image;
														}
														else
														{
															// is this necessary?
														}
											
														Titanium.API.info('PHOTO GALLERY SUCCESS cropRect.x ' + cropRect.x + ' cropRect.y ' + cropRect.y  + ' cropRect.height ' + cropRect.height + ' cropRect.width ' + cropRect.width);
											
													},
													cancel:function()
													{
											
													},
													error:function(error)
													{
													},
													allowEditing:true,
													//popoverView:popoverView,
													//arrowDirection:arrowDirection,
													mediaTypes:[Ti.Media.MEDIA_TYPE_VIDEO,Ti.Media.MEDIA_TYPE_PHOTO]
												});
											}
											openGallery();
											
										});
										
								///////////	Photo2 Button 2
								var photo2 = Ti.UI.createImageView({
									backgroundColor:'white',
									image:'',
									top:5,
									height:150,
									width:150,
								})
								w.add(photo2)
								
								var photo2_btn = Ti.UI.createButton({
									title:'Take it',
									top:5,
									width:100,
									height:30,
								})
								w.add(photo2_btn);
										photo2_btn.addEventListener('click', function()
										{
											Titanium.Media.showCamera({

												success:function(event)
												{
													var cropRect = event.cropRect;
													var image = event.media;
										
													Titanium.Media.saveToPhotoGallery(image);
													///
													photo2.image = image;
										
													Titanium.UI.createAlertDialog({title:'Photo Gallery',message:'Check your photo gallery'}).show();		
												},
												cancel:function()
												{
										
												},
												error:function(error)
												{
													// create alert
													var a = Titanium.UI.createAlertDialog({title:'Camera'});
										
													// set message
													if (error.code == Titanium.Media.NO_CAMERA)
													{
														a.setMessage('Device does not have video recording capabilities');
													}
													else
													{
														a.setMessage('Unexpected error: ' + error.code);
													}
										
													// show alert
													a.show();
												},
												allowEditing:true
											});
										});	
										
								var photo2_btn2 = Ti.UI.createButton({
									title:'Gallery',
									top:5,
									width:100,
									height:30,
								})
								w.add(photo2_btn2);	
										photo2_btn2.addEventListener('click', function()
										{
											function openGallery() {
												Titanium.Media.openPhotoGallery({
											
													success:function(event)
													{
														var cropRect = event.cropRect;
														var image = event.media;
											
														// set image view
														Ti.API.debug('Our type was: '+event.mediaType);
														if(event.mediaType == Ti.Media.MEDIA_TYPE_PHOTO)
														{
															photo2.image = image;
														}
														else
														{
															// is this necessary?
														}
											
														Titanium.API.info('PHOTO GALLERY SUCCESS cropRect.x ' + cropRect.x + ' cropRect.y ' + cropRect.y  + ' cropRect.height ' + cropRect.height + ' cropRect.width ' + cropRect.width);
											
													},
													cancel:function()
													{
											
													},
													error:function(error)
													{
													},
													allowEditing:true,
													//popoverView:popoverView,
													//arrowDirection:arrowDirection,
													mediaTypes:[Ti.Media.MEDIA_TYPE_VIDEO,Ti.Media.MEDIA_TYPE_PHOTO]
												});
											}
											openGallery();
											
										});	
								
								///////////
								
								var label_longitude = Ti.UI.createLabel({
									top:5,
									text:'',
									width:'100%',
									height:20,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:12}
								});
								w.add(label_longitude);
								var label_latitude = Ti.UI.createLabel({
									top:0,
									text:'',
									width:'100%',
									height:20,
									textAlign:'center',
									color:'white',
									shadowColor:'black',
									shadowOffset:{x:0,y:1},
									font:{fontWeight:'bold',fontSize:12}
								});
								w.add(label_latitude);
								
								Titanium.Geolocation.getCurrentPosition(function(e)
									{
										if (e.error)
										{
								                // manage the error
								                return;
										}
								 
										var longitude = e.coords.longitude;
										var latitude = e.coords.latitude;
										var altitude = e.coords.altitude;
										var heading = e.coords.heading;
										var accuracy = e.coords.accuracy;
										var speed = e.coords.speed;
										var timestamp = e.coords.timestamp;
										var altitudeAccuracy = e.coords.altitudeAccuracy;
										
										var mylocation_msg = Ti.UI.createAlertDialog({
											title:'My Current Location',
											message:"Longitude = "+longitude+" Latitude = "+latitude,
										})
										mylocation_msg.show();
										label_longitude.text = longitude;
										label_latitude.text = latitude;
											
									});
								// create a button to send and convert to QR
								var send_data = Titanium.UI.createButton({
									backgroundImage:'images/backbutton.png',
									title:'Send',
									height:40,
									width:150,
									top:5,
									style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,   
								});
								w.add(send_data);
								
								////
								///This creates Qr code and sends data to DB and Facebook
								send_data.addEventListener('click', function()
								{
								w.close();
								//New Win for Secret Code
										var new_win = Ti.UI.createWindow({
											backgroundColor:'black',
											width:800,
											height:600,
										});
										
										//Create Background view for webview
										var backweb_view = Ti.UI.createView({
											backgroundImage:'images/webviewBackground.png',
											height:'295dp',
											width:'295dp',
											top:'60dp',
											});
											new_win.add(backweb_view);
										
										//Mark label for top
										var marktop_label = Ti.UI.createLabel({
											top:0,
											text:'LUUM',
											width:'130dp',
											height:'12dp',
											color:'#ffcc33',
											textAlign:'center',
											font:{fontSize:'9dp'},
											});
											backweb_view.add(marktop_label);	
												
										//Create Webview qrgenerator
										var qrgenerator = Ti.UI.createWebView({
											url:'qrgenerator.html',
											backgroundColor:'black',
											height:'270dp',
											width:'270dp',
											backgroundColor:'#FFFFFF',
											touchEnabled:true,
											visible:true
											});
											backweb_view.add(qrgenerator);	
											//Fire Event To qrgenerator
											qrgenerator.addEventListener('load', function()
										    {
										    var	color = '#00008b';
										    var messageCrypted = 'pollito';
											Ti.App.fireEvent('pollo', {toQR:messageCrypted,color:color});
											});
											
											var share_data = Titanium.UI.createButton({
												backgroundImage:'images/backbutton.png',
												title:'Post Facebook',
												height:40,
												width:150,
												top:400,
												style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,   
											});
											new_win.add(share_data);
											
											// create a button to close window
											var bclose = Titanium.UI.createButton({
												backgroundImage:'images/backcancel.png',
												title:'Cancel',
												height:40,
												width:150,
												top:450,
												style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,   
											});
											new_win.add(bclose);
											
											//Button to close QR window
											bclose.addEventListener('click', function()
											{
												new_win.close();
											});
											
											new_win.open();
											
								});			
											
											
							
								// create a button to close window
								var b = Titanium.UI.createButton({
									backgroundImage:'images/backcancel.png',
									title:'Cancel',
									height:40,
									width:150,
									top:5,
									style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,   
								});
								w.add(b);
								b.addEventListener('click', function()
								{
									var t3 = Titanium.UI.create2DMatrix();
									t3 = t3.scale(0);
									w.close({transform:t3,duration:300});
								});
								
								//Inizialice Components
								w.open(a);	
							
                	
                	
                	
                	
                	
                	
                }
                if (e.index == 1)//Updating existing Sample
                {
                	var t = Titanium.UI.create2DMatrix();
						t = t.scale(0);
					
						var w = Titanium.UI.createWindow({
							backgroundImage:'images/backlogin.png',
							layout:'vertical',
							borderWidth:4,
							borderColor:'#ffffff',
							//height:450,
							//width:320,
							height:430,
							width:300,
							borderRadius:10,
							opacity:0.92,
							transform:t
						});
					
						// create first transform to go beyond normal size
						var t1 = Titanium.UI.create2DMatrix();
						t1 = t1.scale(1.1);
						var a = Titanium.UI.createAnimation();
						a.transform = t1;
						a.duration = 200;
					
						// when this animation completes, scale to normal size
						a.addEventListener('complete', function()
						{
							Titanium.API.info('here in complete');
							var t2 = Titanium.UI.create2DMatrix();
							t2 = t2.scale(1.0);
							w.animate({transform:t2, duration:200});
					
						});
						//Label Title for Step1 Type Message
						var label_popup = Ti.UI.createLabel({
							text:' Search Samples Options',
							width:'100%',
							height:50,
							textAlign:'center',
							color:'white',
							shadowColor:'black',
							shadowOffset:{x:0,y:1},
							font:{fontWeight:'bold',fontSize:18}
						});
						w.add(label_popup);
						
						//From camera
						var camera_btn = Ti.UI.createButton({
							backgroundImage:'images/backbutton.png',
							borderRadius:10,
							top:20,
							title:'From Camera',
							width:200,
							height:50,
							font:{fontWeight:'bold',fontSize:18}
						}) 
						w.add(camera_btn);
						camera_btn.addEventListener('click', function()
						{
							/**
							 * Create a chrome for the barcode scanner.
							 */
							var overlay = Ti.UI.createView({
							    backgroundColor: 'transparent',
							    
							    top: 0, right: 0, bottom: 0, left: 0
							});
							var overlay2 = Ti.UI.createView({
							    backgroundColor: 'transparent',
							    top: 0, right: 0, bottom: 0, left: 0
							});
							overlay.add(overlay2);
							var switchButton = Ti.UI.createButton({
							    title: Barcode.useFrontCamera ? 'Back Camera' : 'Front Camera',
							    textAlign: 'center',
							    color: '#000', backgroundColor: '#fff', style: 0,
							    font: { fontWeight: 'bold', fontSize: 16 },
							    borderColor: '#000', borderRadius: 10, borderWidth: 1,
							    opacity: 0.5,
							    width: 200, height: 30,
							    top:730
							});
							switchButton.addEventListener('click', function () {
							    Barcode.useFrontCamera = !Barcode.useFrontCamera;
							    switchButton.title = Barcode.useFrontCamera ? 'Back Camera' : 'Front Camera';
							});
							overlay.add(switchButton);
							var cancelButton = Ti.UI.createButton({
							    title: 'Cancel', textAlign: 'center',
							    color: '#000', backgroundColor: '#fff', style: 0,
							    font: { fontWeight: 'bold', fontSize: 16 },
							    borderColor: '#000', borderRadius: 10, borderWidth: 1,
							    opacity: 0.5,
							    width: 200, height: 30,
							    top: 30
							});
							cancelButton.addEventListener('click', function () {
							    Barcode.cancel();
							});
							overlay.add(cancelButton);
							
							
							
							
							 reset();
						    // Note: while the simulator will NOT show a camera stream in the simulator, you may still call "Barcode.capture"
						    // to test your barcode scanning overlay.
						    Barcode.capture({
						        animate: true,
						        overlay: overlay,
						        showCancel: false,
						        showRectangle: false,
						        keepOpen: false/*,
						        acceptedFormats: [
						            Barcode.FORMAT_QR_CODE
						        ]*/
						    });
							/**
							 * Now listen for various events from the Barcode module. This is the module's way of communicating with us.
							 */
							var scannedBarcodes = {}, scannedBarcodesCount = 0;
							function reset() {
							    scannedBarcodes = {};
							    scannedBarcodesCount = 0;
							    cancelButton.title = 'Cancel';
							
							}
							Barcode.addEventListener('error', function (e) {
							    var scanerrorAlert = Ti.UI.createAlertDialog({
								title:'luum',
								message:'Error',
								});
								scanerrorAlert.show();
							    
							});
							Barcode.addEventListener('cancel', function (e) {
							    Ti.API.info('Cancel received');
							    
							});
							Barcode.addEventListener('success', function (e) {
							    Ti.API.info('Success called with barcode: ' + e.result);
							    if (!scannedBarcodes['' + e.result]) {
							        scannedBarcodes[e.result] = true;
							        scannedBarcodesCount += 1;
							        cancelButton.title = 'Finished (' + scannedBarcodesCount + ' Scanned)';
							
							        var qrdata  = e.result + ' ';
							        alert(qrdata);
							        
							        
							    }
							});
							
							
							
							
						});	
						//From File
						var file_btn = Ti.UI.createButton({
							borderRadius:10,
							backgroundImage:'images/backbutton.png',
							top:30,
							title:'From File',
							width:200,
							height:'50',
							font:{fontWeight:'bold',fontSize:18}
						}) 
						w.add(file_btn);
						
						file_btn.addEventListener('click', function()
						{
								reset();
							    Ti.Media.openPhotoGallery({
							        success: function (evt) {
							            Barcode.parse({
							                image: evt.media/*,
							                acceptedFormats: [
							                    Barcode.FORMAT_QR_CODE
							                ]*/
							            });
							        }
							    });
								/**
								 * Now listen for various events from the Barcode module. This is the module's way of communicating with us.
								 */
								var scannedBarcodes = {}, scannedBarcodesCount = 0;
								function reset() {
								    scannedBarcodes = {};
								    scannedBarcodesCount = 0;
								    
								
								}
								Barcode.addEventListener('error', function (e) {
								    var scanerrorAlert = Ti.UI.createAlertDialog({
									title:'luum',
									message:'Error',
									});
									scanerrorAlert.show();
								    
								});
								Barcode.addEventListener('cancel', function (e) {
								    Ti.API.info('Cancel received');
								    
								});
								Barcode.addEventListener('success', function (e) {
								    Ti.API.info('Success called with barcode: ' + e.result);
								    if (!scannedBarcodes['' + e.result]) {
								        scannedBarcodes[e.result] = true;
								        scannedBarcodesCount += 1;
								   
								        var qrdata  = e.result + ' ';
								        alert(qrdata);  
								    }
								});	
						
						});
						
						
                		// create a button to close window
						var b = Titanium.UI.createButton({
							backgroundImage:'images/backcancel.png',
							title:'Cancel',
							height:40,
							width:150,
							top:70,
							style : Titanium.UI.iPhone.SystemButtonStyle.BORDERED,    
						});
						w.add(b);
						b.addEventListener('click', function()
						{
							var t3 = Titanium.UI.create2DMatrix();
							t3 = t3.scale(0);
							w.close({transform:t3,duration:300});
						});
						
						//Inizialice Components
						w.open(a);	
                	
                }			
		});


///Popup Login, Register or Recover Password
samples_btn.addEventListener('click', function()
{	
		dialog.show();
});



//
// Window 2 Samples
//
var win2 = Titanium.UI.createWindow({  
    title:'Tab 2',
    backgroundColor:'#fff'
});
win2.orientationModes = [ Titanium.UI.LANDSCAPE_LEFT ];

var tab2 = Titanium.UI.createTab({  
    icon:'KS_nav_ui.png',
    title:'Tab 2',
    window:win2
});

var label2 = Titanium.UI.createLabel({
	color:'#999',
	text:'I am Window 2',
	font:{fontSize:20,fontFamily:'Helvetica Neue'},
	textAlign:'center',
	width:'auto'
});

win2.add(label2);



//
//  add tabs
//
tabGroup.addTab(tab1);  
tabGroup.addTab(tab2);  


// open tab group
tabGroup.open();
