public class CoordinatePoint {
	
	
	public final double latitude;
	public final double longitude;
	public final double timestamp;
	public final int userId;
	
	public CoordinatePoint(double latitude, double longitude, double timestamp, int userId) {
		super();
		this.latitude = latitude;
		this.longitude = longitude;
		this.timestamp = timestamp;
		this.userId = userId;
	}

}
