
<!doctype html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<style>/* Add some margin to the page and set a default font and colour */
 
  body {
      margin: 30px;
      font-family: "Georgia", serif;
      line-height: 1.8em;
      color: white;
    }
     
    /* Give headings their own font */
     
    h1, h2, h3, h4 {
      font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
    }
     
    /* Main content area */
     
    #content {
      margin: 80px 70px;
      text-align: center;
      -moz-user-select: none;
      -webkit-user-select: none;
      user-select: none;
    }
     
    /* Header/footer boxes */
     
    .wideBox {
      clear: both;
      text-align: center;
      margin: 70px;
      padding: 10px;
      background: darkgray;
      border: 1px solid white;
    }
     
    .wideBox h1 {
      font-weight: bold;
      margin: 20px;
      color: rgb(27, 27, 27);
      font-size: 1.5em;
    }
     
    /* Slots for final card positions */
     
    #cardSlots {
      margin: 0 auto 3em auto;
      background: white;
      float: right;
    }
     
    /* The initial pile of unsorted cards */
     
    #cardPile {
      margin: 0 auto;
      background: white;
      float: left;
    }
     
    #cardSlots, #cardPile {
      width: 47%;
      height: 80%;
      padding: .85em;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
      -moz-box-shadow: 0 0 .3em white;
      -webkit-box-shadow: 0 0 .3em white;
      box-shadow: 0 0 .3em white;
    }
     
    /* Individual cards and slots */
     
    #cardSlots div, #cardPile div {
      float: left;
      width: 43%;
      height: 18%;
      padding: .85em;
      padding-top: 40px;
      padding-bottom: 0;
      border: 2px solid darkgray;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
      margin: 10px 0 0 10px;
      background: darkgray;
    }
     
    /*#cardSlots div:first-child, #cardPile div:first-child {
      margin-left: 0;
    }*/
     
    #cardSlots div.hovered {
      background: white;
    }
     
    #cardSlots div {
      border-style: dashed;
    }
     
    #cardPile div {
      background:darkgray;
      color: white;
      font-size: 1em;
      text-shadow: 0 0 3px white;
      text-align: center;
    }
     
    #cardPile div.ui-draggable-dragging {
      -moz-box-shadow: 0 0 .5em white;
      -webkit-box-shadow: 0 0 .5em white;
      box-shadow: 0 0 .5em white;
    }
     
    /* Individually coloured cards */
     
    #card1.correct { background:  rgb(0, 153, 255); }
    #card2.correct { background:  rgb(0, 153, 255); }
    #card3.correct { background:  rgb(0, 153, 255); }
    #card4.correct { background:  rgb(0, 153, 255); }
    #card5.correct { background:  rgb(0, 153, 255); }
    #card6.correct { background:  rgb(0, 153, 255); }
    #card7.correct { background:  rgb(0, 153, 255); }
    #card8.correct { background:  rgb(0, 153, 255); }
    #card9.correct { background:  rgb(0, 153, 255); }
    #card10.correct { background: rgb(0, 153, 255); }
     
     
    /* "You did it!" message */
    #successMessage {
      position: absolute;
      left: 580px;
      top: 250px;
      width: 0;
      height: 0;
      z-index: 100;
      background: #dfd;
      border: 2px solid #333;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
      -moz-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
      -webkit-box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
      box-shadow: .3em .3em .5em rgba(0, 0, 0, .8);
      padding: 20px;
    }
</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript">

var correctCards = 0;
$( init );

function init() {

  // Hide the success message
  $('#successMessage').hide();
  $('#successMessage').css( {
    left: '580px',
    top: '250px',
    width: 0,
    height: 0
  } );

  // Reset the game
  correctCards = 0;
  $('#cardPile').html( '' );
  $('#cardSlots').html( '' );

  // Create the pile of shuffled cards
  var numbers = [ 1, 2, 3, 4, 5, 6];
  var terms = ['1', '2', '3', '4', '5', '6'];
  
   $('<div><img src="c1.png" style="height: 200px;width: 200px"></div>').data( 'number', numbers[0] ).attr( 'id', 'card'+numbers[0] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
    $('<div><img src="j1.jpg" style="height: 200px;width: 200px"></div>').data( 'number', numbers[1] ).attr( 'id', 'card'+numbers[1] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
    $('<div><img src="p1.jpg" style="height: 200px;width: 200px"></div>').data( 'number', numbers[2] ).attr( 'id', 'card'+numbers[2] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
    $('<div><img src="r1.jpg" style="height: 200px;width: 200px"></div>').data( 'number', numbers[3] ).attr( 'id', 'card'+numbers[3] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
    $('<div><img src="rg1.jpg" style="height: 200px;width: 200px"></div>').data( 'number', numbers[4] ).attr( 'id', 'card'+numbers[4] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );
    $('<div><img src="m1.jpg" style="height: 200px;width: 200px"></div>').data( 'number', numbers[5] ).attr( 'id', 'card'+numbers[5] ).appendTo( '#cardPile' ).draggable( {
      
      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    } );

  // Create the card slots
  var words = [ 'one', 'two', 'three', 'four', 'five', 'six'];
  
    $('<div><img src="j2.jpg" style="height: 200px;width: 200px"></div>').data( 'number', 2 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
    $('<div><img src="r2.jpg" style="height: 200px;width: 200px"></div>').data( 'number', 4 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
    $('<div><img src="c2.png" style="height: 200px;width: 200px"></div>').data( 'number', 1 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
    
    $('<div><img src="rg2.jpg" style="height: 200px;width: 200px"></div>').data( 'number', 5 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
     $('<div><img src="m2.jpg" style="height: 200px;width: 200px"></div>').data( 'number', 6 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
    $('<div><img src="p2.jpeg" style="height: 200px;width: 200px"></div>').data( 'number', 3 ).appendTo( '#cardSlots' ).droppable( {
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    } );
    
}

function handleCardDrop( event, ui ) {
  var slotNumber = $(this).data( 'number' );
  var cardNumber = ui.draggable.data( 'number' );

  // If the card was dropped to the correct slot,
  // change the card colour, position it directly
  // on top of the slot, and prevent it being dragged
  // again

  if ( slotNumber == cardNumber ) {
    ui.draggable.addClass( 'correct' );
    ui.draggable.draggable( 'disable' );
    $(this).droppable( 'disable' );
    ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
    ui.draggable.draggable( 'option', 'revert', false );
    correctCards++;
  } 
  
  // If all the cards have been placed correctly then display a message
  // and reset the cards for another go

  if ( correctCards == 6 ) {
    stop();
    $('#successMessage').show();
    $('#successMessage').animate( {
      left: '380px',
      top: '200px',
      width: '400px',
      height: '100px',
      opacity: 1
    } );
  }

}

</script>

</head>


<body class="text-center" style="text-align:center;color:black" onload="show();">
	<div>Time: <span id="time"></span></div>
	<input type="button" value="start" onclick="start();TestsFunction()">
	
  <input type="button" value="reset" onclick="init();reset();window.location.reload();">
  <br><br>
   
</body>
<script>
      function TestsFunction() {
        var T = document.getElementById("TestsDiv");
        T.style.display = "block";  // <-- Set it to block
      }
    var	clsStopwatch = function() {
		// Private vars
		var	startAt	= 0;	// Time of last start / resume. (0 if not running)
		var	lapTime	= 0;	// Time on the clock when last stopped in milliseconds

		var	now	= function() {
				return (new Date()).getTime(); 
			}; 
 
		// Public methods
		// Start or resume
		this.start = function() {
				startAt	= startAt ? startAt : now();
			};

		// Stop or pause
		this.stop = function() {
				// If running, update elapsed time otherwise keep it
				lapTime	= startAt ? lapTime + now() - startAt : lapTime;
				startAt	= 0; // Paused
			};

		// Reset
		this.reset = function() {
				lapTime = startAt = 0;
			};

		// Duration
		this.time = function() {
				return lapTime + (startAt ? now() - startAt : 0); 
			};
	};

var x = new clsStopwatch();
var $time;
var clocktimer;

function pad(num, size) {
	var s = "0000" + num;
	return s.substr(s.length - size);
}

function formatTime(time) {
	var h = m = s = ms = 0;
	var newTime = '';

	h = Math.floor( time / (60 * 60 * 1000) );
	time = time % (60 * 60 * 1000);
	m = Math.floor( time / (60 * 1000) );
	time = time % (60 * 1000);
	s = Math.floor( time / 1000 );
	ms = time % 1000;

	newTime = 20 - pad(s, 2);
  document.getElementById('stime').value = newTime;
  document.getElementById('sscore').value = newTime + 20;
  
	return newTime;
}

function show() {
	$time = document.getElementById('time');
	 
  update();
}

function update() {
	$time.innerHTML = formatTime(x.time());
}

function start() {
	clocktimer = setInterval("update()", 1);
	x.start();
}

function stop() {
	x.stop();
	clearInterval(clocktimer);
}

function reset() {
	stop();
	x.reset();
	update();
}
</script>

<div id="TestsDiv" style="display:none">
    <div id="content" style="zoom: 0.80;">

    <div id="cardPile"> </div>

    <div id="cardSlots"> </div>
    <br><br><br><br><br><br>
    <div id="successMessage" style="zoom: 1;">
      <h2>Congratulations!</h2>
          <form action="scoreboard.php" method="post">
            <p>
                
                <label style="color:black">Name:</label>
                <input type="text" name="sname" id="sname">
            </p>
            <p>
                <label style="color:black">Score:</label>
                <input type="text" name="sscore" id="sscore">
            </p>
            <p>
                <label style="color:black">Time:</label>
                <input type="text" name="stime" id="stime">
            </p>
            <input type="submit" value="Submit">
          </form>

      <button onclick="init();reset()">Play Again</button>
    </div>

    </div>

</div>


  
  <head>
  <style>
  table {
  border-collapse: collapse;
  width: 100%;
  color: #588c7e;
  font-family: monospace;
  font-size: 25px;
  text-align: left;
  }
  th {
  background-color: #588c7e;
  color: white;
  }
  tr:nth-child(even) {background-color: #f2f2f2}
  </style>
  </head>
  <body>
  <table>
  <tr>
  <th>Name</th>
  <th>Score</th>
  <th>Time</th>
  </tr>
  <?php
  $conn = mysqli_connect("localhost", "root", "", "demo");
  // Check connection
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT name, score, time FROM scoreboard";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["name"]. "</td><td>" . $row["score"] . "</td><td>"
  . $row["time"]. "</td></tr>";
  }
  echo "</table>";
  } else { echo "0 results"; }
  $conn->close();
  ?>
  </table>
  </body>

</html>


