<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Organizational Chart</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/orgchart@2.1.9/dist/js/jquery.orgchart.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/orgchart@2.1.9/dist/css/jquery.orgchart.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.10/js/jquery.orgchart.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/2.1.10/css/jquery.orgchart.min.css">

  <style>
    .chart-container-wrapper {
      height: 100%; /* Set the desired height */
      overflow: auto; /* Enable scrolling */
      padding-left: 286px;
      padding-top: 84px;
    }
    .collapsed .nodes {
      display: none;
    }
    #orgchart{
      width: 100%;

    }
    .chart-container{
      height: 100%; /* Set the desired height */
      width: 100%;
    }
    button{
      background-color: rgba(217,83,79,.8);
      font-weight: bold;
      border: none;
      border-radius:5px;
      padding: 12px;
      padding-right: 30px;
      padding-left: 30px;
      color: white;
      margin-top: 50px;
      margin-left: 45%;
    }
    .navbar-custom {
      background-color: rgba(217,83,79,.8);
    }
    .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text, a {
            color: white;
            font-weight: bold;
        }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-custom ">
    <a class="navbar-brand" href="#">Chart Generating System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php echo "Welcome ". $_SESSION['username']?></a>
        </li>
        
       
      </ul>
  
    <div class="navbar-collapse collapse">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
          <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['username']?></a>
        </li>
    </ul>
    </div>
  
  
    </div>
  </nav>
  
  <div class="chart-container-wrapper">
    <div id="chart-container"></div>
  </div>
  <button id="downloadButton">Download as PDF</button>
  <!-- <button id="addNodeButton">Add Node</button> -->

  <script>
    var data = {
  id: 1,
  name: 'John Doe',
  title: 'CEO',
  department: 'Management',
  children: [
    {
      id: 2,
      name: 'Jane Smith',
      title: 'COO',
      department: 'Management',
      children: [
        {
          id: 3,
          name: 'Mark Johnson',
          title: 'Manager',
          department: 'Sales',
          children: [
            {
              id: 6,
              name: 'Emily Davis',
              title: 'Team Lead',
              department: 'Sales',
              children: [
                {
                  id: 11,
                  name: 'Michael Clark',
                  title: 'Salesperson',
                  department: 'Sales'
                },
                {
                  id: 12,
                  name: 'Sophia Walker',
                  title: 'Salesperson',
                  department: 'Sales'
                }
              ]
            },
            {
              id: 7,
              name: 'Oliver Wilson',
              title: 'Team Lead',
              department: 'Sales',
              children: [
                {
                  id: 13,
                  name: 'Lily Anderson',
                  title: 'Salesperson',
                  department: 'Sales'
                },
                {
                  id: 14,
                  name: 'Lucas Martinez',
                  title: 'Salesperson',
                  department: 'Sales'
                }
              ]
            }
          ]
        },
        {
          id: 4,
          name: 'Emily Williams',
          title: 'Manager',
          department: 'Marketing',
          children: [
            {
              id: 8,
              name: 'Harper Taylor',
              title: 'Team Lead',
              department: 'Marketing',
              children: [
                {
                  id: 15,
                  name: 'Emma Adams',
                  title: 'Marketing Specialist',
                  department: 'Marketing'
                },
                {
                  id: 16,
                  name: 'Mason Turner',
                  title: 'Marketing Specialist',
                  department: 'Marketing'
                }
              ]
            },
            {
              id: 9,
              name: 'Ella Thomas',
              title: 'Team Lead',
              department: 'Marketing',
              children: [
                {
                  id: 17,
                  name: 'Ava Lee',
                  title: 'Marketing Specialist',
                  department: 'Marketing'
                },
                {
                  id: 18,
                  name: 'Liam Harris',
                  title: 'Marketing Specialist',
                  department: 'Marketing'
                }
              ]
            }
          ]
        }
      ]
    },
    {
      id: 5,
      name: 'Michael Brown',
      title: 'CTO',
      department: 'Technology',
      children: [
        {
          id: 10,
          name: 'Benjamin Rodriguez',
          title: 'Manager',
          department: 'Technology',
          children: [
            {
              id: 19,
              name: 'Charlotte Scott',
              title: 'Team Lead',
              department: 'Technology',
              children: [
                {
                  id: 20,
                  name: 'Sebastian Hill',
                  title: 'Developer',
                  department: 'Technology'
                }
              ]
            }
          ]
        }
      ]
    }
  ]
};


      var oc;
      var newNodeId = 100;
      $(document).ready(function() {
      // Define the organizational data
      
      // Generate the organizational chart
      oc = $('#chart-container').orgchart({
        data: data,
        nodeContent: 'title',
        nodeID: 'id',
        createNode: function(node, data) {
          // Customize node appearance if needed
        }
      });

      $("#downloadButton").on("click", function() {
        var chartContainer = $('#chart-container')[0];
        html2canvas(chartContainer).then(function(canvas) {
          var imageData = canvas.toDataURL('image/png');
          var docDefinition = {
            content: [
              {
                image: imageData,
                width: 500,
              }
            ]
          };
          pdfMake.createPdf(docDefinition).download('organizational_chart.pdf');
        });
      });

      // Event handler for collapsing and expanding nodes
      $('#chart-container').on('click', '.orgchart .node', function() {
        var $this = $(this);
        if ($this.hasClass('collapsed')) {
          $this.removeClass('collapsed');
          oc.showChildren($this);
        } else {
          $this.addClass('collapsed');
          oc.hideChildren($this);
        }
      });
    });

    // Event handler for editing node title
    $('#chart-container').on('click', '.orgchart .node .title', function(e) {
        e.stopPropagation(); // Prevent event propagation to the node

        var $title = $(this);
        var currentTitle = $title.text();
        var $input = $('<input type="text" class="edit-title" value="' + currentTitle + '">');

        $input.on('keydown', function(event) {
          if (event.keyCode === 13) { // Enter key
            var newTitle = $input.val();
            $title.text(newTitle);
            $input.remove();
          } else if (event.keyCode === 27) { // Escape key
            $input.remove();
          }
        });

        $title.empty().append($input);
        $input.focus();
      });

      // Event handler for adding a new node
      $('#addNodeButton').on('click', function() {
        var selectedNode = $('#chart-container').find('.orgchart .node.focused');
        if (selectedNode.length) {
          newNodeId++; // Increment the ID for each new node
          var newNode = {
            id: newNodeId,
            name: 'New Node',
            title: 'New Title',
            children: []
          };

          oc.addChildren(selectedNode, newNode);
          oc.$chartContainer.empty(); // Clear the chart container
          oc.init(data);
        }
      });
    
    
  </script>
</body>
</html>
