import { View, StyleSheet, Image, TouchableOpacity } from 'react-native';
import { Colors } from '@/constants/Colors';
import { useRouter } from 'expo-router';

export default function TopBar() {
  const router = useRouter();

  return (
    <View style={styles.container}>
      <TouchableOpacity style={styles.leftSection}>
        <Image 
          source={{ uri: 'https://images6.alphacoders.com/132/thumb-1920-1329792.png' }}
          style={styles.logoApp}
        />
      </TouchableOpacity>
      
      <TouchableOpacity 
        style={styles.rightSection}
        onPress={() => router.push('/pages/settings')}
      >
        <Image 
          source={{ uri: 'https://images6.alphacoders.com/132/thumb-1920-1329792.png' }}
          style={styles.profileImage}
        />
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    height: 80,
    backgroundColor: Colors.light.color_1,
    borderBottomWidth: 1,
    borderBottomColor: Colors.light.color_4,
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'flex-end',
    paddingHorizontal: 30,
    paddingBottom: 20,
    marginTop: 50,
  },
  leftSection: {
    flex: 1,
    alignItems: 'flex-start',
  },
  rightSection: {
    alignItems: 'flex-end',
  },
  logoApp: {
    width: 100,
    height: 50,
  },
  profileImage: {
    width: 50,
    height: 50,
    borderRadius: 50,
    borderWidth: 2,
    borderColor: Colors.light.color_8,
  },
});
