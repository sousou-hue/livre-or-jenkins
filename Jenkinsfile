pipeline {
  agent any

  environment {
    IMAGE_NAME = "soumiael774/livre-or-jenkins"
    DOCKER_CREDENTIALS_ID = "dockerhub-credentials"
  }

  stages {
    stage('Diagnostic Docker') {
      steps {
        echo ">>> Docker version and info:"
        sh 'docker version'
        sh 'docker info'
      }
    }

    stage('Build de l\'image Docker') {
      steps {
        echo ">>> Dossier courant: ${pwd()}"
        echo ">>> Listing workspace:"
        sh 'ls -R .'
        echo ">>> Build context = ./website"
        sh 'docker build -t ${IMAGE_NAME} website'
      }
    }

    stage('Push vers DockerHub') {
      steps {
        script {
          docker.withRegistry('https://index.docker.io/v1/', "${DOCKER_CREDENTIALS_ID}") {
            docker.image("${IMAGE_NAME}").push()
          }
        }
      }
    }
  }
}
