def vehicleEntity(item) -> dict:
    return {
        "id": str(item["_id"]),
        "plateId": item["plateId"],
        "brand": item["brand"],
        "model": item["model"],
        "year": item["year"]
    }

def vehiclesEntity(entity) -> list: 
    return [vehicleEntity(item) for item in entity]