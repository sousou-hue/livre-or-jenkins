pipeline {
    agent any

    environment {
        IMAGE_NAME = "soumia/livre-or-jenkins"
        DOCKER_CREDENTIALS_ID = "dockerhub-credentials"
    }

    stages {
        stage('Build de l\'image Docker') {
            steps {
                script {
                    docker.build("${IMAGE_NAME}", "website")
                }
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
