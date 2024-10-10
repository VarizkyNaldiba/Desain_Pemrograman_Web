public class metnum {

    // Metode untuk melakukan pencarian biner
    public static int binarySearch(int[] arr, int target) {
        int left = 0;
        int right = arr.length - 1;

        while (left <= right) {
            int mid = left + (right - left) / 2; // Mencari indeks tengah

            // Cek apakah elemen tengah adalah target
            if (arr[mid] == target) {
                return mid; // Elemen ditemukan
            }
            // Jika target lebih besar, cari di bagian kanan
            else if (arr[mid] < target) {
                left = mid + 1;
            }
            // Jika target lebih kecil, cari di bagian kiri
            else {
                right = mid - 1;
            }
        }

        return -1; // Elemen tidak ditemukan
    }

    public static void main(String[] args) {
        int[] data = {1, 3, 5, 7, 9, 11, 13, 15, 17, 19};
        int target = 7;

        int result = binarySearch(data, target);

        if (result != -1) {
            System.out.println("Elemen " + target + " ditemukan pada indeks " + result + ".");
        } else {
            System.out.println("Elemen " + target + " tidak ditemukan dalam daftar.");
        }
    }
}
