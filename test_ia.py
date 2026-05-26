import requests

# Test 1: Health Check
print("Test 1: Health Check")
response = requests.get("http://localhost:8001/health")
print(f"   Estado: {response.json()}")

# Test 2: Get Embedding (con imagen de prueba)
print("\nTest 2: Extracción de Embedding")
with open('test_face.jpg', 'rb') as f:
    files = {'file': ('test.jpg', f, 'image/jpeg')}
    response = requests.post("http://localhost:8001/get-embedding", files=files)
    print(f"   Estado: {response.json()['success']}")
    print(f"   Tamaño embedding: {response.json().get('embedding_size', 0)}")

print("\nTodos los tests completados")